<?php

namespace MWazovzky\DatabaseLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class DatabaseLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load package factories
        $this->app->make(Factory::class)->load(__DIR__ . '/../database/factories');

        // Load package migrations
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register()
    {
        //
    }
}
