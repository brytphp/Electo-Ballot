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

    public function verify(Request $request)
    {
        $this->validate(request(), [
            'verification_code' => 'required|size:6',
        ]);

        if (auth()->user()->otp != $request->verification_code) {
            return back()->withErrors(['verification_code' => 'Invalid verification code']);
        }

        auth()->user()->update([
            'otp' => null,
            'otp_expires_at' => null,
            'attempted_at' => now(),
            // 'voting_attempts' => auth()->user()->voting_attempts++
        ]);

        return redirect()->route('voter.ballot.paper', [auth()->user()->election->positions()->first()->id]);
    }

    public function verify2(OTPRequest $request)
    {
        auth()->user()->update([
            'otp' => null,
            'otp_expires_at' => null,
            'attempted_at' => now(),
            // 'voting_attempts' => auth()->user()->voting_attempts++
        ]);

        // try {
        //     event(new TotalVotesCast(auth()->user()->election));
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }

        return auth()->user()->election->positions()->first()->id;
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
