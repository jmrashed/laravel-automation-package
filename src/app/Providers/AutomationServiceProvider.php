<?php

namespace Jmrashed\Automation\App\Providers;


use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Jmrashed\Automation\App\Console\MakeFooCommand;
use Jmrashed\Automation\App\Facades\AutomationFacade;
use Jmrashed\Automation\App\Console\AutomationConsole;
use Jmrashed\Automation\App\Http\Middleware\AutomationMiddleware;

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

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                AutomationConsole::class,
                MakeFooCommand::class,
            ]);
        }

        // Merging Into the Existing Configuration
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'automation');


        // Register the command if we are using the application via the CLI




        // src\config\config.php



        if ($this->app->runningInConsole()) {
            // Publish the config file
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('automation.php'),
            ], 'config');
            // The tag that can be used when publishing the config file. 
        }















        if ($this->app->runningInConsole()) {



            // Publish the migration file
            $this->publishes([
                __DIR__ . '/../database/migrations/create_demo_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_demos_table.php'),
            ], 'migrations');
            // The tag that can be used when publishing the migration file.



            // Publish the views
            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/automation'),
            ], 'views');
            // The tag that can be used when publishing the views.


            // Publish the assets
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/automation'),
            ], 'assets');
            // The tag that can be used when publishing the assets.


            // Publish the language files
            $this->publishes([
                __DIR__ . '/../resources/lang' => resource_path('lang/vendor/automation'),
            ], 'lang');
            // The tag that can be used when publishing the language files.


            // Publish the routes
            $this->publishes([
                __DIR__ . '/../routes' => base_path('routes'),
            ], 'routes');
            // The tag that can be used when publishing the routes.


            // Publish the controllers
            $this->publishes([
                __DIR__ . '/../app/Http/Controllers' => app_path('Http/Controllers'),
            ], 'controllers');
            // The tag that can be used when publishing the controllers.


            // Publish the models
            $this->publishes([
                __DIR__ . '/../app/Models' => app_path('Models'),
            ], 'models');
            // The tag that can be used when publishing the models.


            // Publish the events
            $this->publishes([
                __DIR__ . '/../app/Events' => app_path('Events'),
            ], 'events');
            // The tag that can be used when publishing the events.


            // Publish the listeners
            $this->publishes([
                __DIR__ . '/../app/Listeners' => app_path('Listeners'),
            ], 'listeners');
            // The tag that can be used when publishing the listeners.


            // Publish the jobs
            $this->publishes([
                __DIR__ . '/../app/Jobs' => app_path('Jobs'),
            ], 'jobs');
            // The tag that can be used when publishing the jobs.


            // Publish the mail
            $this->publishes([
                __DIR__ . '/../app/Mail' => app_path('Mail'),
            ], 'mail');
            // The tag that can be used when publishing the mail.


            // Publish the notifications
            $this->publishes([
                __DIR__ . '/../app/Notifications' => app_path('Notifications'),
            ], 'notifications');
            // The tag that can be used when publishing the notifications.







        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'automation');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'automation');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');


        // Register the middleware
        $kernel->pushMiddleware(AutomationMiddleware::class);






        // router middleware 

        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('automation', AutomationMiddleware::class);
    }
}
