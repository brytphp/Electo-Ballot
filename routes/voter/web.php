<?php

use App\Http\Controllers\Voter\Ballot\BallotPagesController;
use App\Http\Controllers\Voter\Ballot\BallotPaperController;
use App\Http\Controllers\Voter\Ballot\ConfirmationController;
use App\Http\Controllers\Voter\Ballot\ReceiptController;
use App\Http\Controllers\Voter\Ballot\SkipController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'voter.'], function () {
    Route::middleware(['auth', 'is_voter'])->group(function () {
        Route::get('/election/status', [BallotPagesController::class, 'status'])->name('ballot.status');
        Route::get('/ballot/success', [BallotPagesController::class, 'success'])->name('ballot.success');
        Route::get('/receipt', [ReceiptController::class, 'download'])->name('receipt.download');

        Route::group([
            'middleware' => [
                'has_voted',
            ],
        ], function () {
            Route::group(['prefix' => 'ballot', 'as' => 'ballot.'], function () {
                Route::get('/confirm', ConfirmationController::class)->name('confirm');
                Route::get('/{position}', [BallotPaperController::class, 'index'])->name('paper');
            });

            Route::get('/{position}/skip/{next}', SkipController::class)->name('ballot.skip');
        });
    });
});
