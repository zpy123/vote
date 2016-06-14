<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use DB,Session;
class IndexController extends Controller{
	public function index(){
		return view('Home/welcome');
	}
	//预订酒店
	public function citylist(){
		return view('Home/citylist');
	}
	//最新活动
	public function Activitys(){
		return view('Home/Activitys');
	}
	//礼品商城
	public function gift(){
		return view('Home/gift');
	}
}
?>