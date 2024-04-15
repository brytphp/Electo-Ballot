<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\User;
use Illuminate\Http\Request;

class ExhibitionController extends Controller
{
    public function index()
    {
        $election = Election::first();
        if ($election->enable_exhibition == 'YES' && (\Carbon\Carbon::now()->isBefore($election->exhibition_end_date))) {
            return view('exhibition.index');
        }

        abort(404);
    }

    public function voter(Request $request, User $voter)
    {
        $election = Election::first();

        if ($election->enable_exhibition == 'YES' && (\Carbon\Carbon::now()->isBefore($election->exhibition_end_date))) {
            return view('exhibition.voter', compact('voter'));
        }

        abort(404);
    }
}
