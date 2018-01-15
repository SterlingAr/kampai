<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Http\Services\Osm\OsmService;

class OsmServiceProvider extends ServiceProvider
{

    protected $defer = true; //load only when necessary

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

        $this->app->bind('App\Http\Services\Osm\OsmServiceInterface', function()
        {
            return new OsmService();
        });

    }

    /**
     * Services provided.
     *
     * @return array
     */
    public function provides()
    {
        return ['App\Http\Services\Osm\OsmServiceInterface'];
    }
}
