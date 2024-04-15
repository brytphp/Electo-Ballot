<?php

namespace App\Http\Controllers\Exhibition;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where(function ($query) use ($request) {
            $query->where('email', $request->username)->orWhere('phone', $request->username);
        })->where('voter_id', $request->password)->where('access_role', 'user')->first();

        $link = '<a href="'.route('voter-inclusion').'" class="text-danger">No record found! Click here to submit your current information for possible update.</br> Thank you.</a>';

        if (is_null($user)) {
            return back()->withErrors(['username' => 'No record found', '404' => $link])->withInput();
        }

        // auth()->loginUsingId($user->id);

        if (empty($user->verified_at)) {
            // $msg = 'Good news ' . $user->first_name . '! You can vote for your favorite candidate(s) with same credentials on ' . $user->election->start_date;

            // if (strlen($user->phone) == 10) {
            //     send_sms($user->phone, $msg);
            // }

            // if (!empty($user->email)) {
            //     if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            //         // $user->notify(new VoterVerifiedNotification($msg));
            //     }
            // }

            // $user->update([
            //     'verified_at' => Carbon::now(),
            //     'is_verified' => 1,
            // ]);
        }

        return redirect()->route('exhibition.voter', $user);
    }
}
