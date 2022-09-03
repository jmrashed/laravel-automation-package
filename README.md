Whenever someone includes this package, the service provider will be loaded, and everything we've registered will be available in the application.
Important: this feature is available starting from Laravel 5.5. With version 5.4 or below, you must register your service providers manually in the providers section of the config/app.php configuration file in your laravel project.\

```php
    // 'config/app.php'
    <?php

    'providers' => [
        // Other Service Providers

        App\Providers\AutomationServiceProvider::class,
    ],
```

```php
    php artisan vendor:publish --provider="Jmrashed\Automation\AutomationServiceProvider" --tag="config"
```

```php
    php artisan vendor:publish --provider="JohnDoe\BlogPackage\BlogPackageServiceProvider" --tag="migrations"
```
