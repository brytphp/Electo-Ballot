<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\User;
use App\Notifications\VoterVerifiedNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $election = Election::first();

        if ($election->enable_exhibition == 'yes' && (\Carbon\Carbon::now()->isBefore($election->exhibition_end_date))) {
            return view('exhibition.index');
        }

        abort(404);
    }

    public function submit(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where(function ($query) use ($request) {
            $query->where('email', $request->username)->orWhere('phone', $request->username);
        })->where('voter_id', $request->password)->where('role', 'user')->first();

        $link = '<a href="'.route('voter-inclusion').'" class="text-danger">No record found! Click here to submit your current information for possible update.</br> Thank you.</a>';

        if (is_null($user)) {
            return back()->withErrors(['username' => 'No record found', '404' => $link])->withInput();
        }

        if (empty($user->verified_at)) {
            $msg = 'Good news '.$user->first_name.'! You can vote for your favorite candidate(s) with same credentials on '.$user->election->start_date;

            if (strlen($user->phone) == 10) {
                send_sms($user->phone, $msg);
            }

            if (! empty($user->email)) {
                if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                    $user->notify(new VoterVerifiedNotification($msg));
                }
            }

            $user->update([
                'verified_at' => Carbon::now(),
                'is_verified' => 1,
            ]);
        }

        return redirect()->route('voter.exhibition.details', $user);
    }

    public function details(Request $request, User $voter)
    {
        $election = Election::first();

        if ($election->enable_exhibition == 'yes' && (\Carbon\Carbon::now()->isBefore($election->exhibition_end_date))) {
            return view('exhibition.voter', compact('voter'));
        }

        abort(404);
    }

    public function update(Request $request, User $user)
    {
        $this->validate(request(), [
            'first_name' => 'required',
            'other_names' => 'required',
            'email' => 'required|email',
            'phone' => 'required|phone:GH',
        ], [
            'phone.phone' => 'Please provide a valid phone number',
        ]);

        $user->update([
            'first_name' => str_replace(',', '', format_name(trim($request->first_name))),
            'other_names' => ucwords(strtolower(trim($request->other_names))),
            'email' => preg_replace(' /\s+/', '', trim($request->email)),
            'phone' => format_phone_number($request->phone),
        ]);

        return $request;
    }
}
