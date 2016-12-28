<?php

namespace Ken\SpiderAdmin;

use Illuminate\Support\ServiceProvider;

class SpiderAdminServiceProvider extends ServiceProvider
{
	public function register()
	{
		// $this->app['spider'] = $this->app->share(function($app) {
		// 	return new Spider;
		// });
		$this->app->bind('spider', function($app) {
			return new SpiderAdmin($app);
		});
	}

	public function boot()
	{
		require __DIR__ . '/routes/web.php';

		$this->loadViewsFrom(__DIR__ . '/resources/views/vendor', 'spider');

		$this->mergeConfigFrom(__DIR__ . '/config/spider/config.php', 'spider');

		$this->publishes([__DIR__ . '/resources/views/vendor/layouts' => resource_path('views/vendor/spider/layouts')], 'views');

		$this->publishes([__DIR__ . '/resources/views/vendor/partials' => resource_path('views/vendor/spider/partials')], 'views');

		$this->publishes([__DIR__ . '/resources/views/vendor/sample' => resource_path('views')], 'view');

		$this->publishes([__DIR__ . '/public' => public_path('vendor')], 'asset');

		$this->publishes([__DIR__ . '/config' => config_path()], 'config');

		$this->publishes([__DIR__ . '/app/Models' => base_path('app/Models')], 'models');

		$this->publishes([__DIR__ . '/database/migrations' => database_path('/migrations')], 'migrations');

		$this->publishes([__DIR__ . '/database/seeds' => database_path('/seeds')], 'seeds');
	}
}
