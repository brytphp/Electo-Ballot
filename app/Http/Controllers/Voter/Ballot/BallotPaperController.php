<?php

namespace App\Http\Controllers\Voter\Ballot;

use App\Electo\BallotPaper;
use App\Http\Controllers\Controller;

class BallotPaperController extends Controller
{
    protected $ballot;

    public function __construct(BallotPaper $ballot)
    {
        $this->ballot = $ballot;
    }

    public function index()
    {
        $data = $this->ballot->ballotPaper();

        $unopposed_position = null;

        if (isset($data['data']['position']['unopposed']) && $data['data']['position']['unopposed'] == 1) {
            $unopposed_position = $data['data']['candidates'][0]['id'];
        }


        return view('voter.home.home', compact('data', 'unopposed_position'));
    }
}
