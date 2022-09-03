<?php

namespace Jmrashed\Automation;

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


        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'automation');
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

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
        }
    }
}
