#Spider-AdminLTE for laravel 5.3.*
[![a.png](https://s17.postimg.org/igbo0p033/image.png)](https://postimg.org/image/xp1legtrf/)

## About Spider-AdminLTE

[diaddemi](https://www.diaddemi.web.id)<br/>

Spider-AdminLTE is packages for build dashboard admin make AdminLTE 2 | Dashboard - Almsaeed Studio, just install this packages you get dashboard admin [AdminLTE 2 | Dashboard - Almsaeed Studio](https://almsaeedstudio.com/themes/AdminLTE/index2.html), [SweetAlert2](https://limonte.github.io/sweetalert2), [animate.css](https://daneden.github.io/animate.css)
Thanks to :
[AdminLTE 2 | Dashboard - Almsaeed Studio](https://almsaeedstudio.com/themes/AdminLTE/index2.html)<br/>
[SweetAlert2](https://limonte.github.io/sweetalert2)<br/>
[animate.css](https://daneden.github.io/animate.css)<br/>

## Installations

Using Composer

```
composer require ken/spider-admin
```

Add the service provider to `config/app.php`

```php

'providers' => [
    Ken\SpiderAdmin\App\Providers\SpiderAdminServiceProvider::class,
    Collective\Html\HtmlServiceProvider::class, // laravelcollective/html class
    Intervention\Image\ImageServiceProvider::class, // intervention/image class
]

'aliases' => [
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
    'Image' => Intervention\Image\Facades\Image::class,
]
```

and running

```
php artisan vendor:publish
```
```
php artisan migrate
```
```
composer dumpautoload
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

place this code in to `App\Http\Kernel.php`

```php
protected $routeMiddleware = [
        'spider' => \Ken\SpiderAdmin\App\Http\Middleware\SpiderToRedirect::class,
    ];
```
## Usage

You can custom `views/vendor/spider/partials/customize/sidebar-menu.blade.php` for managemen menu.<br/>
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
if you not change route prefix yours App, or like 

```php 
Route::group(['prefix' => config('spider.config.route_prefix')] , function() {
   // yours route in here
});
```
if you change route prefix yours App.

You can customize `config/spider/config.php` for identity yours app and yours route prefix 

### Basic

Route Basic

```
localhost:8000/spider
````
Auth Basic

Basic Credentials this App is fields `name` or  fields `email` from table `users`

```
username : spider `or` spider@diaddemi.web.id
password : spider 
```

## Issues and contribution

Just submit an issue or pull request through GitHub. Thanks!
