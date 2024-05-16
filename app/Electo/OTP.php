<?php

namespace App\Electo;

use Carbon\Carbon;

class OTP
{
    public function generate()
    {
        $code = $this->generate_code();
        $this->save_code($code);

        return $code;
    }

    protected function save_code($code)
    {
        $otp_expires_at = Carbon::now()->addMinutes(10);
        auth()->user()->update([
            'otp' => $code,
            'otp_expires_at' => $otp_expires_at,
            'otp_attempts' => auth()->user()->otp_attempts + 1
        ]);

        auth()->user()->otps()->create([
            'otp' => $code,
            'otp_expires_at' => $otp_expires_at
        ]);
    }

    protected function generate_code()
    {
        return rand(999, 9999);
    }
}
