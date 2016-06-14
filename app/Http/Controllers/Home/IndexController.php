<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use DB,Session;
class IndexController extends Controller{
	public function index(){
		return view('Home/welcome');
	}
	//预订酒店
	public function CityList(){
		return view('Home/CityList');
	}
	//最新活动
	public function Activitys(){
		return view('Home/Activitys');
	}
	//我的订单
	public function login(){
		return view('Home/login');
	}
	//礼品商城
	public function GiftList(){
		return view('Home/GiftList');
	}
	//帮助咨询
	public function help(){
		return view('Home/help');
	}
	//立即免费注册
	public function register(){
		return view('Home/register');
	}
}
?>