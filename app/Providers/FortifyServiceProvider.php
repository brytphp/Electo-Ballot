<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Election;
use App\Models\Login;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(function () {

            $election = Election::first();
            $now = Carbon::now();
            $start = Carbon::parse($election->start_date);
            $end = Carbon::parse($election->end_date);

            if ($now->isBefore($start) || $now->isAfter($end)) {
                return view('voter.home.status');
            }

            return view('auth.login');
        });

        Fortify::authenticateUsing(function (Request $request) {

            $user = User::where(function ($query) use ($request) {
                return $query->where('email', $request->email)
                    ->orWhere('phone', $request->email);
            })
                ->where('voter_id', $request->password)
                ->where('access_role', 'user')
                ->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $agent = new Agent();
                $log = new Login();
                $log->ip = $request->getClientIp();
                $log->agent = $request->server('HTTP_USER_AGENT');
                $log->platform = $agent->platform();
                $log->browser = $agent->browser();
                $log->device = $agent->device();
                $log->robot = $agent->robot();
                $user->logins()->save($log);

                return $user;
            }
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.email');
        });

        Fortify::resetPasswordView(function ($request) {
            return view('auth.passwords.reset', ['request' => $request]);
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email.$request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
