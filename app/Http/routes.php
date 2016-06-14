<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//前台
Route::get('/', 'Home\IndexController@index');
Route::get('citylist', 'Home\IndexController@citylist');
Route::get('Activitys', 'Home\IndexController@Activitys');
Route::get('gift', 'Home\IndexController@gift');


//后台
Route::get('myadmin','Admin\IndexController@index');