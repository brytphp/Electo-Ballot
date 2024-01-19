<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BallotPagesController extends Controller
{
    public function status()
    {
        $now = Carbon::now();
        $start = Carbon::parse(auth()->user()->election->start_date);
        $end = Carbon::parse(auth()->user()->election->end_date);

        if ($now->isBefore($start)) {
            return view('voter.home.status');
        } elseif (auth()->user()->election->is_active == 1 && auth()->user()->election->is_sealed == 1) {
            return redirect()->route('voter.ballot.paper', [auth()->user()->election->positions()->first()->id]);
        }

        return view('voter.home.status');
    }

    public function success()
    {
        // if (auth()->user()->voted_at == null) {
        //     return redirect()->route('voter.ballot.paper', [auth()->user()->election->positions()->first()->id]);
        // }

        return view('voter.home.success');
    }

    public function close()
    {
        return view('voter.home.close');
    }
}
