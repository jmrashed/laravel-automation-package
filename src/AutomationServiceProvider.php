<?php

namespace Jmrashed\Automation;
use Illuminate\Contracts\Http\Kernel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;
use Jmrashed\Automation\Facades\AutomationFacade;
use Jmrashed\Automation\Console\AutomationConsole;

class AutomationServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind('automation', function ($app) {
            return new AutomationFacade();
        });


        // $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'automation');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'automation');

    }

    public function boot(Kernel $kernel)
    {
        $kernel->pushMiddleware(AutomationMiddleware::class);
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('automation', AutomationMiddleware::class);


        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->registerRoutes();



        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                AutomationConsole::class,
            ]);
        }

        // Schedule the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->app->booted(function () {
                $schedule = $this->app->make(Schedule::class);
                $schedule->command('some:command')->everyMinute();
            });
        }
 
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('automation.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations/create_demos_table.php.stub' =>
                database_path('migrations/' . date('Y_m_d_His', time()) . '_create_demos_table.php'),
                // you can add any number of migrations here
            ], 'migrations');

            // Publish views
            $this->publishes([
              __DIR__.'/../resources/views' => resource_path('views/vendor/automation'),
            ], 'views');

            // Publish assets
            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('automation'),
            ], 'assets');

        }
    }






protected function registerRoutes()
{
    Route::group($this->routeConfiguration(), function () {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    });
}

protected function routeConfiguration()
{
    return [
        'prefix' => config('automation.prefix'),
        'middleware' => config('automation.middleware'),
    ];
}
}
