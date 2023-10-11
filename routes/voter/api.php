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

Route::group([
    'prefix' => 'ballot',
    'as' => 'api.ballot.',
], function () {
    Route::group(['prefix' => 'data', 'as' => 'data.'], function () {
        Route::get('options/{position}', \App\Http\Controllers\Api\Ballot\BallotPaperController::class)->name('options');
        Route::get('/preference', \App\Http\Controllers\Api\Ballot\GetVoterPreferenceController::class)->name('get.preference');
        Route::post('/preference', \App\Http\Controllers\Api\Ballot\SaveVoterPreferenceController::class)->name('save.preference');
    });

    Route::group([
        'prefix' => 'paper',
        'as' => 'paper.',
        'middleware' => ['has_voted'],
    ], function () {
        Route::post('/vote', \App\Http\Controllers\Api\Ballot\VoteController::class)->name('vote');
    });
});
