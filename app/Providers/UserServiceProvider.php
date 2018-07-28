<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Services\User\UserService;

class UserServiceProvider extends ServiceProvider
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
        $this->app->bind('App\Http\Services\User\UserServiceInterface',
            'App\Http\Services\User\UserService');
    }


    public function provides()
    {
        return ['App\Http\Services\User\UserServiceInterface'];
    }
}
