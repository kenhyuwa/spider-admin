<?php

Route::get('/login', function() {
	return redirect()->to('/spider');
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
  Route::post('/logout', [
			'as' => 'spider',
			'uses' => 'LoginController@logout'
		]);

});

Route::group(['prefix' => 'spider', 'namespace' => 'Ken\SpiderAdmin\App\Http\Controllers', 'middleware' => 'web'], function() {
  Route::get('/dashboard', [
			'as' => 'spider',
			'uses' => 'SpiderAdminController@index'
		]);
});
