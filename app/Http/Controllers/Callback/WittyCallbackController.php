<?php

namespace App\Http\Controllers\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Log;

class WittyCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        send_sms();

        Log::channel('sms')->info('sms', [
            'response' => $request->cost,
        ]);
    }
}
