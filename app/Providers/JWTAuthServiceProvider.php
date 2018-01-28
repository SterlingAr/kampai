<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class JWTAuthServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Http\Services\Auth\JWTAuthServiceInterface',
            'App\Http\Services\Auth\JWTAuthService');
    }

    public function provides()
    {
        return ['App\Http\Services\Auth\JWTAuthServiceInterface'];
    }
}
