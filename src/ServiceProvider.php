<?php

namespace LaravelReady\EmojiApi;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use LaravelReady\EmojiApi\Services\EmojiApiService;

final class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap of package services
     *
     * @return void
     */
    public function boot(Router $router): void
    {
        $this->bootPublishes();

        $this->loadRoutes();
    }

    /**
     * Register any application services
     *
     * @return void
     */
    public function register(): void
    {
        // package config file
        $this->mergeConfigFrom(__DIR__ . '/../config/emoji-api.php', 'emoji-api');

        // register package service
        $this->app->singleton('emoji-api', function () {
            return new EmojiApiService();
        });
    }

    /**
     * Publishes resources on boot
     *
     * @return void
     */
    private function bootPublishes(): void
    {
        // package configs
        $this->publishes([
            __DIR__ . '/../config/emoji-api.php' => $this->app->configPath('emoji-api.php'),
        ], 'emoji-api-config');

    }

    /**
     * Load pacakge-specific routes
     *
     * @return void
     */
    private function loadRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
