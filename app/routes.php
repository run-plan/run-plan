<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

// 走る
Route::group(['prefix' => 'run'], function() {
	Route::get('/', 'RunController@index');
	Route::get('/start', 'RunController@start');
	Route::get('/end', 'RunController@end');
});

// 走った
Route::group(['prefix' => 'record'], function() {
	Route::get('/', function(){
		return View::make('record.index');
	});
});

// プラン
Route::group(['prefix' => 'plan'], function(){
	Route::get('/', 'PlanController@index');
	Route::get('/distance', 'PlanController@distance');
	Route::get('/map', 'PlanController@map');

});

// 友だり
Route::group(['prefix' => 'friends'], function() {
	Route::get('/', function(){
		return View::make('friends.index');
	});
});

Route::get('/search/', function () {

	$input = Input::only([
		'api_key',
		'location',
		'radius',
	]);
	$url = 'https://maps.googleapis.com/maps/api/place/search/json?location=' . $input['location'] . '&radius=' . $input['radius'] . '&types=lodging&language=ja&sensor=false&key=' . $input['api_key'];
	return file_get_contents($url);
});