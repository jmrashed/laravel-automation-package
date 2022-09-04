<?php

namespace Jmrashed\Automation;

use Illuminate\Contracts\Http\Kernel;

use Illuminate\Routing\Route;
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

    }

    public function boot(Kernel $kernel)
    {
        $kernel->pushMiddleware(AutomationMiddleware::class);


        $this->registerRoutes();
        $this->loadViews();
        $this->loadMigrations();



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
            ], 'migrations');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/automation'),
            ], 'views');

            // Publish assets
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('automation'),
            ], 'assets');
        }
    }






    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }


    protected function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'automation');
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
