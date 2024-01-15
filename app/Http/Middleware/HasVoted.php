<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HasVoted
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->voted_at != null) {
            return redirect()->route('voter.ballot.success');
        }

        if (auth()->user()->election->authentication == 'USERNAME_PASSWORD' && auth()->user()->voted_at == null) {
            return $next($request);
        }

        if (auth()->user()->election->authentication == 'USERNAME_PASSWORD_OTP' && ! empty(auth()->user()->otp) && auth()->user()->voted_at == null) {
            return redirect()->route('voter.verification.form')->with('auth_success', 'Verification code sent.');
        }

        if (auth()->user()->election->is_sealed == 0 || auth()->user()->election->is_active == 0) {
            return redirect()->route('voter.ballot.status');
        }

        return $next($request);
    }
}
