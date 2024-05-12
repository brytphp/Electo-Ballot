<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\OTPVerificationRequest;
use Illuminate\Http\Request;

class OTPVerificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(OTPVerificationRequest $request)
    {
        auth()->user()->update([
            'otp' => null,
            'otp_expires_at' => null,
            'attempted_at' => now(),
        ]);

        // try {
        //     event(new TotalVotesCast(auth()->user()->election));
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        return auth()->user()->election->positions()->first()->id;
    }
}
