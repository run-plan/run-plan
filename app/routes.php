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

Route::get('/map/', function(){
	Input::all();

})