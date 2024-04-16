<?php

namespace App\Providers;

use App\Electo\BallotPaper;
use App\Electo\CollationCenter;
use App\Electo\OTP;
use App\Models\Election;
use App\Models\ElectoSettings;
use Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ElectoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Electo\BallotPaper', function ($app) {
            return new BallotPaper();
        });

        $this->app->bind('App\Electo\OTP', function ($app) {
            return new OTP();
        });

        $this->app->bind('App\Electo\CollationCenter', function ($app) {
            return new CollationCenter();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $election_frontend = Cache::remember('election_frontend', 3600, function () {
            return Election::first();
        });

        if ($election_frontend) {
            View::share([
                'election' => $election_frontend,
                'show_election_countdown' => Carbon::now()->between($election_frontend->start_date, $election_frontend->end_date),
            ]);
        }

        config([
            'electo_settings' => Cache::rememberForever('electo_settings', function () {
                return ElectoSettings::all(['key', 'value'])
                    ->keyBy('key')
                    ->transform(function ($settings) {
                        return $settings->value;
                    })
                    ->toArray();
            }),
        ]);
    }
}
