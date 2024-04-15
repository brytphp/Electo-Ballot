<?php

namespace App\Http\Controllers\Api\Exhibition;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateRegister extends Controller
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
            'first_name' => str_replace(',', '', format_name(trim($request->first_name))),
            'other_names' => ucwords(strtolower(trim($request->other_names))),
            'email' => preg_replace(' /\s+/', '', trim($request->email)),
            'phone' => format_phone_number($request->phone),
            'country_code' => $request->country_code,
            'verified_at' => now(),
            'system_checked_phone_at' => now(),
        ]);

        return $request;
    }
}
