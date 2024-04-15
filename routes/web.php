<?php

use App\Http\Controllers\Auth\OPTController;
use App\Http\Controllers\ExhibitionController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\VoterUpdateController;
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

Route::get('/', function () {
    // return view('welcome');
    // return view('index');
    return view('electo');
})->name('index');

Route::get('/home', RedirectController::class)->name('home');

Route::prefix('verify')->group(function () {
    Route::get('/', [OPTController::class, 'index'])->name('voter.verification.form');
    Route::get('/resend', [OPTController::class, 'resend'])->name('voter.verification.resend');
});

Route::group([
    'prefix' => 'exhibition',
    'as' => 'exhibition.',
    // 'middleware' => 'auth'
], function () {
    Route::get('/', [ExhibitionController::class, 'index'])->name('login.form');
    Route::post('/', \App\Http\Controllers\Exhibition\AuthController::class)->name('login.submit');
    Route::get('/voter/{voter}', [ExhibitionController::class, 'voter'])->name('voter');
});

Route::get('/voter-inclusion', [VoterUpdateController::class, 'index'])->name('voter-inclusion');
Route::post('/voter-inclusion', [VoterUpdateController::class, 'submit'])->name('voter-inclusion.submit');

Route::get('/profile/{candidate}', [ProfileController::class, 'index'])->name('profile');

Route::get('/logout', function () {
    return redirect()->route('index');
});

Route::patch('/fcm-token', [FirebaseController::class, 'updateToken'])->name('update-firebase-token');

Route::post('/send-notification', [FirebaseController::class, 'notification'])->name('notification');

// php artisan queue:retry all
// php artisan short-schedule:run
// ./vendor/bin/pint
// ./vendor/bin/phpstan analyse --memory-limit=2G
// nvm use default 16.15.0
// ab -n 100 -c 10 http://electo.test
