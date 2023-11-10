<?php

use App\Models\User;

function voter()
{
    return User::whereNull('voted_at')->whereNotNull('phone')->first();

    return User::whereNull('voted_at')->inRandomOrder()->first();
}

function otp()
{
    return auth()->user()->otp;
}
