<?php

namespace App\Http\Controllers\Api\Ballot;

use App\Events\DrawChart;
use App\Events\TotalVotesCast;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class VoteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        foreach (auth()->user()->votes as $vote) {
            $agent = new Agent();
            $vote->update([
                'voted_at' => now(),
                'ref' => auth()->user()->election->ref,
                'ip' => $request->getClientIp(),
                'agent' => $request->server('HTTP_USER_AGENT'),
                'platform' => $agent->platform(),
                'browser' => $agent->browser(),
                'device' => $agent->device(),
            ]);
        }

        auth()->user()->update([
            'voted_at' => Carbon::now(),
        ]);

        $election = auth()->user()->election;

        try {
            event(new TotalVotesCast($election));
            event(new DrawChart($election));
        } catch (\Throwable $th) {
            send_sms('233248130682', 'Pusher error');
        }

        try {
            $msg = 'Congrats! Voting successful. Please stay tuned for further updates. Thank you.';

            if (strlen(auth()->user()->phone) == 10) {
                send_sms(auth()->user()->phone, $msg);
            }

            // if (!empty(auth()->user()->email)) {
            //     if (filter_var(auth()->user()->email, FILTER_VALIDATE_EMAIL)) {
            //         Mail::to(auth()->user()->email)->send(new VotingSuccessful(auth()->user()->first_name));
            //     }
            // }

        } catch (exception $e) {
            //code to handle the exception
        }

        return $request;
    }
}
