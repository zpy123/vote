<?php
namespace App\Http\Controllers\Home;
header("content-type:text/html;charset=utf8");

use App\Http\Controllers\Controller;

use DB,Session,Request;
class GiftController extends Controller{
	//礼品商城，礼品列表展示
	public function GiftList()
	{
		//查询礼品数据
		$gift = DB::table('gift')->get();
		// print_r($gift);die;
		return view('Home/GiftList')->with('gift',$gift);
	}

	//礼品详情页
	public function Gift()
	{
		//接受礼品id
		$g_id = Request::get('id');
		// dd($g_id);
		//查询礼品详情
		$data = DB::table('gift')->where('g_id','=',$g_id)->first();
		return view('Home/Gift')->with('data',$data);
	}
}
