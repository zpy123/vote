<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use  DB,Response,Request,Session;
use App\Http\Requests;

class LoginController extends Controller{

	public function login()
	{
		return view('Admin/login');
	}

	public function loginPro()
	{

		//进行后台登录的验证
		$data = $_GET;
		//print_r($data);
		//
		$users = DB::table('owner')->where($data)->first();
		//var_dump($users);die;

		//进行非逻辑判断
		if($users){
			Session::put('manager_name',$data['manager_name']);
			Session::put('manager_id',$users['manager_id']);
			Session::save();
			//$manager_name = Session::get('manager_name');
			echo 1;die;
		} else {
			echo 0;die;
		}

	}

	//退出
	public function loginOut(){
		Session::forget('manager_name');
		return view('Admin/login');
	}
}
?>