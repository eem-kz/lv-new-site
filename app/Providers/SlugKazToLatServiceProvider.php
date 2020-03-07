<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SlugKazToLatServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('SlugKazToLat','App\Services\SlugKazToLat');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
