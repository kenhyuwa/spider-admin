<?php

namespace Ken\SpiderAdmin\App\Providers;

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
		require __DIR__ . '/../../routes/spider.php';

		$this->loadViewsFrom(__DIR__ .'/../../resources/views/vendor', 'spider');

		$this->mergeConfigFrom(__DIR__.'/../../config/spider/config.php', 'spider');

		$this->publishes([__DIR__.'/../../resources/views/vendor' => resource_path('views/vendor/spider')], 'views');

		$this->publishes([__DIR__.'/../../public' => public_path('vendor')], 'asset');

		$this->publishes([__DIR__.'/../../config' => config_path()], 'config');
	}
}
