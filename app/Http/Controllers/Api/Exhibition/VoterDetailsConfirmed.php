<?php

namespace App\Http\Controllers\Api\Exhibition;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class VoterDetailsConfirmed extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(VoterUpdateRequest $request, User $user)
    {
        $user->update([
            'verified_at' => now(),
            'system_checked_phone_at' => now(),
        ]);

        return $request;
    }
}
