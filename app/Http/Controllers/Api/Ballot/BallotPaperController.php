<?php

namespace App\Http\Controllers\Api\Ballot;

use App\Electo\BallotPaper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BallotPaperController extends Controller
{
    protected $ballot;

    public function __construct(BallotPaper $ballot)
    {
        $this->ballot = $ballot;
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->ballot->ballotPaper();
    }
}
