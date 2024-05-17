<?php

namespace App\Http\Controllers\Api\Ballot;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class SaveVoterPreferenceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Carbon::now()->between(auth()->user()->election->start_date, auth()->user()->election->end_date) && auth()->user()->election->is_active == 1) {
            if (auth()->user()->voted_at == null) {
                if (empty($request->candidates)) {
                    abort(202);
                }

                $position = Position::findOrFail(request()->position);
                $request['candidates'] = array_slice($request->candidates, 0, $position->votes_per_voter);

                Vote::whereElection_id(auth()->user()->election->id)
                    ->whereUser_id(auth()->id())
                    ->wherePosition_id(request()->position)
                    ->whereNull('voted_at')
                    ->delete();

                foreach ($request->candidates as $key => $candidate) {
                    $agent = new Agent();
                    Vote::Create(
                        [
                            'election_id' => auth()->user()->election->id,
                            'user_id' => auth()->id(),
                            'position_id' => request()->position,
                            'candidate_id' => $candidate,
                            'ip' => $request->getClientIp(),
                            'agent' => $request->server('HTTP_USER_AGENT'),
                            'platform' => $agent->platform(),
                            'browser' => $agent->browser(),
                            'device' => $agent->device(),
                            'robot' => $agent->robot(),
                        ]
                    );
                }

                return $request;
            }

            abort(404);
        }
    }
}
