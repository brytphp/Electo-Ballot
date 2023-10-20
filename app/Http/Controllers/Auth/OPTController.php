<?php

namespace App\Http\Controllers\Auth;

use App\Electo\OTP;
use App\Events\TotalVotesCast;
use App\Http\Controllers\Controller;
use App\Http\Requests\OTPRequest;
use App\Notifications\GetVerificationCode;
use Illuminate\Http\Request;

class OPTController extends Controller
{
    protected $electo_verification;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!empty(auth()->user()->voted_at)) {
            return redirect()->route('voter.ballot.success');
        }

        return view('auth.otp');
    }

    public function resend(OTP $otp)
    {
        if (now()->isBefore(auth()->user()->otp_expires_at)) {
            return back()->with('auth_error', 'Please request a new code in 3 minutes time');
        }

        $otp = $otp->generate();

        if (is_null(auth()->user()->voted_at)) {
            send_sms(auth()->user()->phone, $otp);
            auth()->user()->notify(new GetVerificationCode($otp));

            return back()->with('auth_success', 'Verification code sent.');
        } else {
            return redirect()->route('index');
        }
    }
}
