<?php

namespace M3assy\Nationals;

use Illuminate\Support\ServiceProvider;
use M3assy\Nationals\Console\AddRegionsCommand;
use M3assy\Nationals\Console\AllCountriesCommand;

class NationalsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/nationals.php' => config_path('nationals.php'),
            ], 'nationals.config');

            $this->commands([
                AllCountriesCommand::class,
                AddRegionsCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nationals.php', 'nationals');

        $this->app->singleton('nationals', function ($app) {
            return new Nationals;
        });
    }

    public function provides()
    {
        return ['nationals'];
    }
}
