# MWwazovzky\Laravel-Database-Logger

## Creates Laravel Log channel that writes into database

### Version: 0.0.1

### Installation.

Install package into Laravel project via composer
```
$ composer require mwazovzky/laravel-database-logger
```

Publish and run package migrations
```
$ php artisan vendor:publish --tag=migrations --force
$ php artisan migrate
```

Add `database` Log channel into `config/logging.php`
```php
return [
    // ...
    'channels' => [
        // ...
        // Custom Database Logger
        'database' => [
            'driver' => 'custom',
            'via' =>  MWazovzky\DatabaseLogger\CreateDatabaseLogger::class,
        ],
    ],
];
```

### Documentation

1. Use `database` channel to write into database.
All standard  logger  method are available.
Use context to store custom log parameters.
```php
use Illuminate\Support\Facades\Log;
...
Log::channel('database')->log('error', 'some-message', ['foo' => 'bar']);
```

2. Multiple database channels may be created to filter log enties.

3. Context  attributes `batch_type` and `batch_id` (default value for both
is `null`) may be used to build polymorphic relation to any other Model(s),
e.g. synchronisation event Model that triggered related log entries.
