<?php

use Illuminate\Support\Str;

return [
    'electo_channel' => Str::slug(env('ELECTO_CHANNEL', 'Laravel')),

    'pusher_key' => env('PUSHER_APP_KEY'),
    'pusher_cluster' => env('PUSHER_APP_CLUSTER'),
    'pusher_secrete' => env('PUSHER_APP_SECRET'),

    'mail_from_address' => env('MAIL_FROM_ADDRESS'),
];
