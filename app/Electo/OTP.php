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
        auth()->user()->update([
            'otp' => $code,
            'otp_expires_at' => Carbon::now()->addMinutes(10),
            'otp_attempts' => auth()->user()->otp_attempts + 1
        ]);
    }

    protected function generate_code()
    {
        return rand(999, 9999);
    }
}
