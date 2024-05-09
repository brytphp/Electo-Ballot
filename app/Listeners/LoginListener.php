<?php

namespace App\Listeners;

use App\Electo\OTP;
use App\Notifications\OTPNotification;
use Illuminate\Support\Facades\Auth;

class LoginListener
{
    protected $otp;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(OTP $otp)
    {
        $this->otp = $otp;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->user->access_role == 'user') {
            if ($event->user->voted_at == null && $event->user->election->is_active == 1) {
                $otp_code = $this->otp->generate();

                $sms = 'Keep your account safe. Do not share your one time password with anyone. Your password is ' . $otp_code;

                send_sms(auth()->user()->phone, $sms);

                if (!empty(auth()->user()->email)) {
                    if (filter_var(auth()->user()->email, FILTER_VALIDATE_EMAIL)) {
                        try {
                            auth()->user()->notify(new OTPNotification($otp_code));
                        } catch (\Throwable $th) {
                            //throw $th;
                        }
                    }
                }
            }

            Auth::logoutOtherDevices($event->user->voter_id);
        }

        // dd($event->user);
    }
}
