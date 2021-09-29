<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Galon\GalonService as GalonServiceContract;
use App\Services\Galon\GalonService;

class GalonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // $this->app->bind(GalonServiceContract::class, GalonService::class);
        $this->app->bind(GalonService::class, function ($app) {
            return new GalonService();
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
