<?php

namespace App\Http\Controllers\Api\Exhibition;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoterUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Http;
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
            'email_checked_at' => now(),
            'phone_checked_at' => now(),
            'system_checked_phone_at' => now(),
            'date_of_birth' => $request->date_of_birth,
            'admission_year' => Carbon::parse($request->admission_year)->format('Y-m-01'),
        ]);


        try {
            $response = Http::withToken('NlTkaKzI0HGWjAcEPVebrIWxplQmSahZW1c8QdP5')->post('http://37.27.25.242:10815/api/admin/update_member_details', [
                'date_of_birth' => $request->date_of_birth,
                'admission_year' => Carbon::parse($request->admission_year)->format('Y-m-01'),
                'email' => preg_replace(' /\s+/', '', trim($request->email)),
                'phone' => format_phone_number($request->phone),
                "member_id" => $user->voter_id,
            ]);

            echo $response->status();
        } catch (\Throwable $th) {
            //throw $th;
        }




        return $request;
    }
}
