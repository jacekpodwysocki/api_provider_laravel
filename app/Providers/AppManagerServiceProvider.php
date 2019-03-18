<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Library\Services\JobOffer;

class AppManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\Services\Contracts\CustomServiceInterface', function ($app) {
          return new JobOffer();
        });
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
