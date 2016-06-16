<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use DB,Session;
class RegisterController extends Controller
{
	//注册
	public function reg_pro()
	{
		//接值
		$data = Request::all();
		$data['u_integral']=10;
		unset($data['_token']);
		DB::table("user")->insert($data);
		return redirect("login");
	}
	//登陆
	
	
}
?>