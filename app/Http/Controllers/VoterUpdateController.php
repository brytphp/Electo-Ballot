<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoterInclusionRequest;
use App\Models\Election;
use App\Models\User;
use App\Models\VoterInclusion;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class VoterUpdateController extends Controller
{
    public function index()
    {
        $election = Election::first();
        $countries = new Countries();
        $countries = $countries->all()->pluck('name.common')->toArray();

        if ($election->enable_exhibition == 'YES' && (\Carbon\Carbon::now()->isBefore($election->exhibition_end_date))) {
            return view('exhibition.voter-inclusion', compact('countries'));
        }

        abort(404);
    }

    public function submit(VoterInclusionRequest $request)
    {
        // $user =  User::where('voter_id', $request->voter_id)->where('role', 'user')->first();

        // if (!is_null($user)) {

        //     if ($request->email_update == 1) {
        //         $user->update([
        //             'first_name' => str_replace(',', '', format_name(trim($request->surname))),
        //             'other_names' => ucwords(strtolower(trim($request->other_names))),
        //             'email' => preg_replace(' /\s+/', '', trim($request->email)),
        //         ]);
        //     }

        //     if ($request->phone_update == 1) {
        //         $user->update([
        //             'first_name' => str_replace(',', '', format_name(trim($request->surname))),
        //             'other_names' => ucwords(strtolower(trim($request->other_names))),
        //             'phone' => format_phone_number($request->phone),
        //         ]);
        //     }

        //     return back()->withSuccess('Request submitted successfully');
        // }

        VoterInclusion::create($request->validated());

        return back()->withSuccess('Request submitted successfully');
    }
}
