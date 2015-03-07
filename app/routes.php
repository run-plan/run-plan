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

Route::group(['prefix' => 'plan'], function(){
	Route::get('/', 'PlanController@index');
	Route::get('/distance', 'PlanController@distance');
	Route::get('/map', 'PlanController@map');

});

Route::get('/search/', function () {

	$input = Input::only([
		'api_key',
		'location',
		'radius',
	]);
	$url = 'https://maps.googleapis.com/maps/api/place/search/json?location=' . $input['location'] . '&radius=' . $input['radius'] . '&types=lodging&language=ja&sensor=false&key=' . $input['api_key'];
//	$uel = 'https://maps.googleapis.com/maps/api/place/search/json?location=35.6814,139.7674&radius=3000&types=lodging&language=ja&sensor=false&key=AIzaSyCEabJeAlGcLRxfAbv3vhMhSEUjGvEWuj0';
	return file_get_contents($url);
});