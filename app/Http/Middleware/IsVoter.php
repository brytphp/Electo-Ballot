<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVoter
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->access_role != 'user') {
            abort(404);
        }

        return $next($request);
    }
}
