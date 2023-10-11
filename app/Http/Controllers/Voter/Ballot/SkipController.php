<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class SkipController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $agent = new Agent();
        Vote::updateOrCreate(
            [
                'election_id' => auth()->user()->election->id,
                'user_id' => auth()->id(),
                'position_id' => request()->position,
            ],
            [
                'candidate_id' => null,
                'ip' => $request->getClientIp(),
                'agent' => $request->server('HTTP_USER_AGENT'),
                'platform' => $agent->platform(),
                'browser' => $agent->browser(),
                'device' => $agent->device(),
                'robot' => $agent->robot(),
            ]
        );

        return redirect()->route('voter.ballot.paper', [request()->next]);
    }
}
