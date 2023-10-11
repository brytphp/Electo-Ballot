<?php

namespace App\Providers;

use App\Models\Election;
use App\Models\ElectoSettings;
use Horizon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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

        config([
            'electo_settings' => ElectoSettings::all(['key', 'value'])
                ->keyBy('key')
                ->transform(function ($settings) {
                    return $settings->value;
                })
                ->toArray(),
        ]);

        // if($this->app->environment('production')) {
        //     \URL::forceScheme('https');
        // }

        View::share([
            'election' => Election::first() ?? null,
        ]);

        Horizon::auth(function ($request) {
            // dd($request);
            // return true / false;
        });
    }
}
