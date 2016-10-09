<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use DB,Session;
class MygridController extends Controller
{

	/**
	 * 我的格子
	 * @return [type] [description]
	 */
	public function my_count()
	{
		$u_name = Session::get('u_name');
		$u_id = Session::get('u_id');
		if($u_id=='' && $u_name==''){
			echo "<script>alert('您还没有登录，请先去登陆哦！');location.href='login';</script>";
		}else{
			$data=DB::table('user')->where('u_id',$u_id)->get();
			return view('Home/my_account')->with('data',$data);
		}
		
	}
	/**
	 * 我的信息
	 * @return [type] [description]
	 */
	public function my_list(){
		$u_id = Session::get('u_id');
		$data=DB::table('user')->where('u_id',$u_id)->get();
		//print_r($data);die;
		$phone1=$data[0]['u_phone'];
		$phone2=substr($phone1,3,4);
		$phone3=str_replace($phone2,'****', $phone1);
		$data[0]['u_phone']=$phone3;
		$card1=$data[0]['u_card'];
		$card2=substr($card1,6,8);
		$card3=str_replace($card2,'********', $card1);
		$data[0]['u_card']=$card3;
		return view('Home/my_list')->with('data',$data);
	}
	/**
	 * 修改个人信息
	 */
	public function save_user(){
		//接值
		$data=Request::all();
		//print_r($data);die;
		$id=$data['u_id'];
		//print_r($data);die;
		unset($data['_token']);
		$re=DB::table('user')->where('u_id',$id)->update($data);
		if($re){
			return redirect('my_count');
		}else{
			return view('Home/my_list');
		}
	}

	
}
?>