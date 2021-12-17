<?php

namespace Openstamanager\ExampleModule;

use Illuminate\Support\ServiceProvider;

class ExampleModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/example.module.php', 'attivita.tipi');

        $this->publishConfig();
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->publishes([
            __DIR__ . '/../dist' => public_path('build/vendor/openstamanager/example.module')
        ], 'example.module:assets');
        $this->publishes([
            __DIR__ . '/../dist' => resource_path('static/vendor/openstamanager/example.module')
        ], 'example.module:assets-dev');

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'attivita.tipi');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        cache()->forever('modules.example.module.drawer_routes', $this->getDrawerRoutes());
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/example.module.php' => config_path('example.module.php'),
            ], 'config');
        }
    }

    public function getDrawerRoutes() {
        return [
            'example.module' => [
                'icon' => 'shape-outline',
                'text' => __('Example module menu entry')
            ]
        ];
    }
}
