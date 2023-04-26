<?php

namespace Openstamanager\ExampleModule;

use App\ModuleServiceProvider;
use Illuminate\Support\Facades\Route;

class ExampleModuleServiceProvider extends ModuleServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/example.module.php', 'example.module');

        $this->publishConfig();
        $this->loadRoutes();

        $this->publishes([
            __DIR__ . '/../dist' => public_path('build/vendor/openstamanager/example.module')
        ], 'example.module:assets');
        $this->publishes([
            __DIR__ . '/../dist' => resource_path('static/vendor/openstamanager/example.module')
        ], 'example.module:assets-dev');

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'example.module');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
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

    public function loadRoutes(): void {
        Route::group(['middleware' => 'web'], function () {
            $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        });

        Route::group(['prefix' => 'api', 'middleware' => 'api'], function () {
            $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        });
    }
}
