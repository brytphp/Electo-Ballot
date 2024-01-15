<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class RedirectVoter
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $now = Carbon::now();
        $start = Carbon::parse(auth()->user()->election->start_date);
        $end = Carbon::parse(auth()->user()->election->end_date);

        if ($now->between($start, $end)) {
            return redirect()->route('voter.ballot.paper', auth()->user()->election->positions()->first()->id);
        }

        return redirect()->route('voter.ballot.status');

        return $next($request);
    }
}
