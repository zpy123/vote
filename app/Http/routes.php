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
//前台
Route::get('myhome', 'Home\IndexController@index');

Route::get('Activitys', 'Home\IndexController@Activitys');
Route::get('login', 'Home\IndexController@login');
Route::get('loginOUT', 'Home\IndexController@loginOUT');
// Route::get('GiftList', 'Home\IndexController@GiftList');
Route::get('help', 'Home\IndexController@help');
Route::get('register', 'Home\IndexController@register');

Route::get('my_order', 'Home\OrderController@my_order');
Route::get('ping', 'Home\OrderController@ping');
//我的格子
Route::get('my_count', 'Home\MygridController@my_count');
Route::get('my_list', 'Home\MygridController@my_list');
Route::post('save_user', 'Home\MygridController@save_user');

// Route::get('aa',function(){
// 	return view('Home/a');
// });

//预定酒店
Route::get('CityList', 'Home\HotelorderController@CityList');
Route::get('hotellist', 'Home\HotelorderController@hotellist');
Route::get('hotel', 'Home\HotelorderController@hotel');
Route::get('hotelinfo', 'Home\HotelorderController@hotelinfo');
Route::get('hotelreview', 'Home\HotelorderController@hotelreview');
Route::get('day_update', 'Home\HotelorderController@day_update');
Route::get('yuding', 'Home\HotelorderController@yuding');
Route::get('hotelmap', 'Home\HotelorderController@hotelmap');
Route::get('showxiang', 'Home\HotelorderController@showxiang');
//酒店导航
Route::any('HotelGps', 'Home\GpsController@HotelGps');
//支付
Route::get('pay','Home\PAYController@return_url');
//酒店管理（评论）
Route::get('comment_pro', 'Home\HotelorderController@comment_pro');

//个人中心
Route::get('my_gift', 'Home\IndexController@my_gift');
Route::get('my_collection', 'Home\IndexController@my_collection');
Route::get('collection', 'Home\IndexController@collection');
Route::get('qucollection', 'Home\IndexController@qucollection');
//礼品商城
Route::get('Home/GiftList', 'Home\GiftController@GiftList');
//礼品详情
Route::get('Home/Gift', 'Home\GiftController@Gift');
//用户兑换礼品
Route::any('Home/GiftExchange','Home\GiftOrderController@GiftExchange');
//生成订单
Route::any('Home/exchangeOrder','Home\GiftOrderController@exchangeOrder');

//忘记密码（前台）
Route::get('change_pwd', 'Home\RegisterController@change_pwd');
Route::post('getpwd2', 'Home\RegisterController@getpwd2');
Route::get('getpwd5', 'Home\RegisterController@getpwd5');
Route::post('getpwd4', 'Home\RegisterController@getpwd4');
Route::get('getpwd3', 'Home\RegisterController@getpwd3');

//帮助咨询
Route::get('help', 'Home\IndexController@help');
Route::get('kefu', 'Home\IndexController@kefu');
Route::get('zhong', 'Home\IndexController@zhong');
Route::get('message', 'Home\IndexController@message');
Route::post('message_add', 'Home\IndexController@message_add');

//前台注册
Route::post('reg_pro','Home\RegisterController@reg_pro');
Route::get('log_hpro','Home\RegisterController@log_hpro');

//前台注册
Route::post('reg_pro','Home\RegisterController@reg_pro');
Route::post('log_hpro','Home\RegisterController@log_hpro');


//后台登陆
Route::get('admin_','Admin\LoginController@login');
Route::get('loginPro','Admin\LoginController@loginPro');
Route::get('loginOut','Admin\LoginController@loginOut');

//中间件
Route::group(['middleware' => ['permission']],function() {
	//后台首页
	Route::get('myadmin','Admin\IndexController@index');

	//后台管理者
	Route::get('form_owner','Admin\OwnerController@index');
	Route::post('owner_pro','Admin\OwnerController@owner_pro');
	Route::any('list_owner','Admin\OwnerController@list_owner');
	Route::get('owner_del','Admin\OwnerController@owner_del');
	//用户验证唯一
	Route::get('owner_name','Admin\OwnerController@owner_name');
	//房型验证唯一
	Route::get('house_name', 'Admin\HouseController@house_name');
	//酒店验证唯一
	Route::get('hotel_name', 'Admin\HotelController@hotel_name');

	// 酒店添加，列表展示，删除
	Route::get('hotelform','Admin\HotelController@index');
	Route::post('hoteladd','Admin\HotelController@insert');
	Route::get('hotellst','Admin\HotelController@pub_list');
	Route::get('hoteldel','Admin\HotelController@pub_delete');
	Route::get('hotelrooms','Admin\HotelController@pub_look');
	Route::get('hotelgethome','Admin\HotelController@pub_gethome');
	Route::post('hotelgetroom','Admin\HotelController@pub_getroom');
	Route::get('hotelmes','Admin\HotelController@pub_update');

	//酒店订单
	Route::any('PubList','Admin\OrderController@PubList');
	Route::any('PubOrderDel','Admin\OrderController@PubOrderDel');

	//礼品管理
	Route::any('Gift','Admin\GiftController@Gift');
	Route::any('GiftShow','Admin\GiftController@GiftShow');
	Route::any('GiftListDel','Admin\GiftController@GiftListDel');

	//房型管理
	Route::get('houseadd','Admin\HouseController@houseadd');
	Route::get('house_list', 'Admin\HouseController@house_list');
	Route::post('p_file', 'Admin\HouseController@p_file');
	Route::get('update', 'Admin\HouseController@update');
	Route::post('up_adds', 'Admin\HouseController@up_add');
	Route::get('delete', 'Admin\HouseController@delete');

	//礼品订单管理
	Route::get('GiftList','Admin\GiftorderController@GiftList');
	Route::get('DelGift','Admin\GiftorderController@DelGift');
	//酒店活动管理
	Route::get('AddAct','Admin\ActController@AddAct');
	Route::post('InsertAct','Admin\ActController@InsertAct');
	Route::get('ActList','Admin\ActController@ActList');
	Route::get('DelAct','Admin\ActController@DelAct');


	//地区管理
	Route::get('address_list','Admin\ActController@address_list');
	//后台帮助查询展示
	Route::get('message_list', 'Admin\MessageController@message_list');
	Route::get('deletes', 'Admin\MessageController@deletes');

	//角色管理
	Route::get('roleAdd','Admin\RoleController@roleAdd');
	Route::get('roleList','Admin\RoleController@roleList');
	Route::get('roleTask','Admin\RoleController@roleTask');
	Route::get('roleTaskpro','Admin\RoleController@roleTaskpro');
	Route::get('roleDel','Admin\RoleController@roleDel');

	//权限管理
	Route::any('privilegeAdd','Admin\PrivilegeController@privilegeAdd');
	Route::get('privilegeList','Admin\PrivilegeController@privilegeList');
	Route::get('roleprivilegeList','Admin\PrivilegeController@roleprivilegeList');
	Route::get('privilegeDel','Admin\PrivilegeController@privilegeDel');
	Route::get('privilegeTask','Admin\PrivilegeController@privilegeTask');
	Route::get('privilegeTaskpro','Admin\PrivilegeController@privilegeTaskpro');
	Route::get('privilegeChecked','Admin\PrivilegeController@privilegeChecked');

});
	//Route::get('index','Admin\DemoController@index');
