<?php

namespace App\Http\Controllers\Api\Ballot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetVoterPreferenceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return auth()->user()->votes()
            ->whereElection_id(auth()->user()->election->id)
            ->wherePosition_id(request()->position)
            ->whereNotNull('candidate_id')
            ->pluck('candidate_id');
    }
}
