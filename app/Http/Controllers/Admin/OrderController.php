<?php
namespace App\Http\Controllers\Admin;

use DB,Request;
use App\Http\Controllers\Controller;
class OrderController extends Controller{
	/**
	* 酒店订单查询
	*/
	public function PubList(){
		//查询订单表数据
		$arr = DB::table('order')->get();
		// print_r($data);
		return view('Admin\publist')->with('arr',$arr);
	}

	/**
	* 酒店订单删除
	*/
	public function PubOrderDel()
	{
		//接受数据
		$id = Request::get('o_id');
		// print_r($id);die;

		//删除数据
		$result = DB::table('order')->where('o_id','=',$id)->delete();
		if ($result) {
			return redirect('myadmin/PubList');
		}else{
			echo "0";
		}
	}
}
?>