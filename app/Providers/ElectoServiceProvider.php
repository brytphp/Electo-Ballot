<?php

namespace App\Providers;

use App\Electo\BallotPaper;
use App\Electo\CollationCenter;
use App\Electo\OTP;
use App\Models\Election;
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
        $election = Election::first();

        if ($election) {
            View::share([
                'election' => $election,
                'show_election_countdown' => Carbon::now()->between($election->start_date, $election->end_date),
            ]);
        }
    }
}
