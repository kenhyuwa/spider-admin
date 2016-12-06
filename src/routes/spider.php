<?php

Route::get('/login', function() {
	return redirect()->to(config('spider.config.route_prefix'));
});

Route::get('/home', function() {
	return redirect()->to(config('spider.config.route_prefix').'/dashboard');
});

Route::group(['prefix' => config('spider.config.route_prefix'), 
		'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers\Auth', 
		'middleware' => 'web'], function() {

  Route::get('/', [
			'as' => 'spider',
			'uses' => 'LoginController@showLoginForm'
		]);
  Route::post('/login', [
			'as' => 'spider',
			'uses' => 'LoginController@login'
		]);
  Route::post('/logout', [
			'as' => 'spider',
			'uses' => 'LoginController@logout'
		]);

});

Route::group(['prefix' => config('spider.config.route_prefix'), 
		'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers', 
		'middleware' => ['web', 'auth']], function() {

  Route::get('/dashboard', [
			'as' => 'spider',
			'uses' => 'SpiderAdminController@index'
		]);
  Route::get('/my-profile/{id}', [
			'as' => 'spider',
			'uses' => 'ProfileController@myAccount'
		]);
  Route::post('/my-profile/{id}', [
			'as' => 'spider',
			'uses' => 'ProfileController@Account'
		]);
});

Route::group(['prefix' => config('spider.config.route_prefix'), 
		'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers', 
		'middleware' => ['web', 'auth', 'spider']], function() {

  Route::get('/users', [
			'as' => 'spider',
			'uses' => 'UserController@usersAll'
		]);
  Route::get('/users/create', [
			'as' => 'spider',
			'uses' => 'UserController@create'
		]);
  Route::post('/users/create', [
			'as' => 'spider',
			'uses' => 'UserController@store'
		]);
  Route::get('/user', [
			'as' => 'spider',
			'uses' => 'UserController@user'
		]);
  Route::get('/users/{id}/detail', [
			'as' => 'spider',
			'uses' => 'UserController@userDetail'
		]);
  Route::post('/users/{id}', [
			'as' => 'spider',
			'uses' => 'UserController@update'
		]);
  Route::get('/users/{id}', [
			'as' => 'spider',
			'uses' => 'UserController@getDetail'
		]);
  Route::post('/users/{id}/delete', [
			'as' => 'spider',
			'uses' => 'UserController@delete'
		]);
});
