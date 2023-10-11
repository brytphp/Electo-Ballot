<?php

use App\Http\Controllers\Auth\OPTController;
use App\Http\Controllers\Callback\WittyCallbackController;
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
    Route::post('/', [OPTController::class, 'verify'])->name('voter.verification');
    Route::post('/v2', [OPTController::class, 'verify2'])->name('voter.otp2');
    Route::get('/resend', [OPTController::class, 'resend'])->name('voter.verification.resend');
});

Route::prefix('exhibition')->group(function () {
    Route::get('/', [ExhibitionController::class, 'index'])->name('voter.exhibition');
    Route::post('/', [ExhibitionController::class, 'submit'])->name('voter.exhibition.submit');
    Route::get('/voter/{voter}', [ExhibitionController::class, 'details'])->name('voter.exhibition.details');
    Route::post('/voter/{user}/update', [ExhibitionController::class, 'update'])->name('voter.exhibition.update');
});

Route::get('/voter-inclusion', [VoterUpdateController::class, 'index'])->name('voter-inclusion');
Route::post('/voter-inclusion', [VoterUpdateController::class, 'submit'])->name('voter-inclusion.submit');

Route::post('/sms-call-back-response', [OPTController::class, 'verify'])->name('sms-call-back-response');

Route::get('/profile/{candidate}', [ProfileController::class, 'index'])->name('profile');

Route::get('/logout', function () {
    return redirect()->route('index');
});

Route::patch('/fcm-token', [FirebaseController::class, 'updateToken'])->name('update-firebase-token');

Route::post('/send-notification', [FirebaseController::class, 'notification'])->name('notification');

Route::post('/sms-callback', WittyCallbackController::class)->name('sms-callback');

// php artisan queue:retry all
// php artisan short-schedule:run
// ./vendor/bin/pint
// ./vendor/bin/phpstan analyse --memory-limit=2G
// nvm use default 16.15.0
// ab -n 100 -c 10 http://electo.test
git remote add origin git@github.com:brytphp/electo-ballot.git

git remote set-url origin git@github.com:brytphp/electo-ballot.git
