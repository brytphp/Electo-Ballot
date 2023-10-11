<?php

use App\Models\User;

function voter()
{
    return User::whereNull('voted_at')->first();

    return User::whereNull('voted_at')->inRandomOrder()->first();
}

function otp()
{
    return auth()->user()->otp;
}
