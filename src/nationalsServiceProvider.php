<?php

namespace m3assy\nationals;

use Illuminate\Support\ServiceProvider;
use m3assy\nationals\console\AddCitiesCommand;
use m3assy\nationals\console\AllCountriesCommand;

class nationalsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'm3assy');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'm3assy');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {

            // Publishing the configuration file.
            $this->publishes([
                __DIR__.'/../config/nationals.php' => config_path('nationals.php'),
            ], 'nationals.config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/m3assy'),
            ], 'nationals.views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/m3assy'),
            ], 'nationals.views');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/m3assy'),
            ], 'nationals.views');*/

            // Registering package commands.
            $this->commands([
            		AllCountriesCommand::class,
								AddCitiesCommand::class,
						]);
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/nationals.php', 'nationals');

        // Register the service the package provides.
        $this->app->singleton('nationals', function ($app) {
            return new nationals;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['nationals'];
    }
}