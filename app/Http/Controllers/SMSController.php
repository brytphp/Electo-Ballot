<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SMSController extends Controller
{
    public function sms_callback(Request $request)
    {
        Log::channel('sms')->info('sms_callback', [
            'request' => $request,
        ]);
    }
}
