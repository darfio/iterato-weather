<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Weather\Providers\OpenWeatherServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Weather\Weather', function($app){
            return new OpenWeatherServiceProvider();
        });
    }
}
