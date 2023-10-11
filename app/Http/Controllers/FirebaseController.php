<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirebaseController extends Controller
{
    public function updateToken(Request $request)
    {
        if (Auth::check()) {
            try {
                $request->user()->update(['fcm_token' => $request->token]);

                return response()->json([
                    'success' => true,
                ]);
            } catch (\Exception $e) {
                report($e);

                return response()->json([
                    'success' => false,
                ], 500);
            }
        }
    }
}
