<?php

namespace EgeaTech\LaravelExceptions\Providers;

use Illuminate\Support\ServiceProvider;
use EgeaTech\LaravelExceptions\LaravelExceptions;

class LaravelExceptionsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton('laravel-exceptions', function ($app) {
            return new LaravelExceptions;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['laravel-exceptions'];
    }
}
