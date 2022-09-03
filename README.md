## Laravel Automation Package

This package help you to build a crud system without any coding.

## Installation

Require this package with composer. It is recommended to only require the package for development.

```
    composer require jmrashed/automation --dev
```

Laravel uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

# Laravel without auto-discovery:

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
    // 'config/app.php'
    <?php

    'providers' => [
        // Other Service Providers

        App\Providers\AutomationServiceProvider::class,
    ],
```

If you want to use the facade to log messages, add this to your facades in app.php:

```php
 'Automation' => Jmrashed\Automation\Facades\Automation::class,
```

## publish

`php artisan vendor:publish --provider="Jmrashed\Automation\AutomationServiceProvider"`

## Usage in Controller

```php
// call automation
 Automation::create('Model');

```

## Usage in Blade

```php
// call automation
    {{ automation('Model')}}
```
