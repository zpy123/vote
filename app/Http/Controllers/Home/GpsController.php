<?php
namespace App\Http\Controllers\Home;
header("content-type:text/html;charset=utf8");

use App\Http\Controllers\Controller;

use DB,Session,Request;
class GpsController extends Controller{
	public function HotelGps()
	{
		//接受数据id
		$pub_id = Request::get('id');
		// dd($pub_id);

		//查询酒店详情
		$pub = DB::table('guest')->where('pub_id',$pub_id)->first();
		// dd($pub);

		//查询酒店地址的坐标
		// $gps = file_get_contents("http://api.map.baidu.com/geocoder?address=".$pub['pub_address']."&output=html");
		// dd($gps);

		return view('Home/hotelgps',['pub'=>$pub]);


	}
}
