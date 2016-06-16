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
Route::get('CityList', 'Home\IndexController@CityList');
Route::get('Activitys', 'Home\IndexController@Activitys');
Route::get('login', 'Home\IndexController@login');
Route::get('GiftList', 'Home\IndexController@GiftList');
Route::get('help', 'Home\IndexController@help');
Route::get('register', 'Home\IndexController@register');


//后台
Route::get('myadmin','Admin\IndexController@index');
//后台管理者
Route::get('form_owner','Admin\OwnerController@index');
Route::post('owner_pro','Admin\OwnerController@owner_pro');
Route::get('list_owner','Admin\OwnerController@list_owner');
Route::get('owner_del','Admin\OwnerController@owner_del');

