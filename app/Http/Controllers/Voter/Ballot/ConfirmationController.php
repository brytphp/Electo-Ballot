<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $votes = auth()->user()->votes()
            ->with(['candidate', 'position'])
            ->whereElection_id(auth()->user()->election->id)
            ->get();

        $back = auth()->user()->election->positions()->where('order_of_appearance', auth()->user()->election->positions()->max('order_of_appearance'))->pluck('id')[0];

        $data['data'] = [
            'positions' => auth()->user()->election->positions,
        ];

        return view('voter.home.confirm', compact('back', 'votes', 'data'));
    }
}
