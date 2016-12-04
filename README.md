#Spider-AdminLTE for laravel 5.3.*


## Installations

Using Composer

```
composer require ken/spider-admin
```

Add the service provider to `config/app.php`

```php
Ken\SpiderAdmin\App\Providers\SpiderAdminServiceProvider::class,
```

and running

```
php artisan vendor:publish
```
```
php artisan migrate
```
```
php artisan db:seed --class=SpiderSeeder
```

## Setting Models Authenticate

open file in `config/auth.php`
edit  file

```php
'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
```
to be 

```php
'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],
```

## Setting Kernel

place this code to `App\Http\Kernel.php`

```php
protected $routeMiddleware = [
        'spider' => \Ken\SpiderAdmin\App\Http\Middleware\SpiderToRedirect::class,
    ];
```
## Usage

You can custom `views/vendor/spider/partials/customize/sidebar-menu.blade.php` for managemen menu.
You can custom `views/vendor/spider/partials/customize/dropdown.blade.php` for notifications

If you create new blade, you must extends yours file like

```php 
@extends('spider::layouts.apps')

@section('content')
    // yours content in here
@endsection
```

You can also create new file Javascript or CSS, 

```php
@section('css')
    // yours css in here 
@endsection

@section('script')
    // yours script in here 
@endsection
```

You can also create new `Route` in `Routes/web.php` and its no problem. but, you must create route prefix like 

```php 
Route::group(['prefix' => 'spider'] , function() {
   // yours route in here
});
```

### Basic

Route Basic

```
localhost:8000/spider
````
Auth Basic

```
username : spider 
password : spider 
```

## Issues and contribution

Just submit an issue or pull request through GitHub. Thanks!
