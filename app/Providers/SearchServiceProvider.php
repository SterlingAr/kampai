<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Services\Search\SearchService;


class SearchServiceProvider extends ServiceProvider
{

    protected $defer = true; //load only when necessary

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind('App\Http\Services\Search\SearchServiceInterface', function()
//        {
//            return new SearchService();
//        });

        $this->app->bind('App\Http\Services\Search\SearchServiceInterface',
            'App\Http\Services\Search\SearchService');



    }

    /**
     * Provides SearchService
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Http\Services\Search\SearchServiceInterface'];

    }
}
