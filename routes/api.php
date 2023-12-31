<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    include __DIR__.'/voter/api.php';

    Route::group([
        'prefix' => 'api',
        'as' => 'api.',
    ], function () {
        Route::group([
            'prefix' => 'auth',
            'as' => 'auth.',
        ], function () {
            Route::post('/verify-otp', \App\Http\Controllers\Auth\OTPVerificationController::class)->name('verify-otp');
        });
    });
});
