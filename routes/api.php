<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'app'], function(){
	
	Route::resource('book', 'Book\ApiController');

	Route::post('signup', 'Auth\ApiController@signup');

	Route::post('logIn', 'Auth\ApiController@logIn');

	Route::post('logOut', 'Auth\ApiController@logOut');
	
	Route::post('user', 'Auth\ApiController@user');
	
});