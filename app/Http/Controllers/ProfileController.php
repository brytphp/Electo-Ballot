<?php

namespace App\Http\Controllers;

use App\Models\Candidate;

class ProfileController extends Controller
{
    public function index(Candidate $candidate)
    {
        return view('profile', compact('candidate'));
    }
}
