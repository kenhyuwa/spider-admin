<?php

Route::get('/login', function() {
	return redirect()->to('/spider');
});

Route::get('/home', function() {
	return redirect()->to('/spider/logout');
});

Route::group(['prefix' => 'spider', 'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers\Auth', 'middleware' => 'web'], function() {

  Route::get('/', [
			'as' => 'spider',
			'uses' => 'LoginController@showLoginForm'
		]);
  Route::post('/login', [
			'as' => 'spider',
			'uses' => 'LoginController@login'
		]);
  Route::get('/logout', [
			'as' => 'spider',
			'uses' => 'LoginController@logout'
		]);
  Route::post('/logout', [
			'as' => 'spider',
			'uses' => 'LoginController@logout'
		]);

});

Route::group(['prefix' => 'spider', 'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers', 'middleware' => ['web', 'auth']], function() {
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
