<?php

namespace VICITECH\ViciCMS;

use Illuminate\Support\ServiceProvider;

class VicitechServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'ViciCMS');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/ViciCMS'),
        ]);
        $this->publishes([
            __DIR__.'/style' => base_path('public'),
        ]);
        $this->publishes([
            __DIR__ . '/migrations/' => base_path('/database/migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('VICITECH\ViciCMS\ProviderController');
        $this->app->make('VICITECH\ViciCMS\ProductController');
        $this->app->make('VICITECH\ViciCMS\ProductGroupController');
        $this->app->make('VICITECH\ViciCMS\SlideController');
    }
}
