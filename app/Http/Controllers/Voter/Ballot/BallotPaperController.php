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

        return view('voter.home.home', compact('data'));
    }
}
