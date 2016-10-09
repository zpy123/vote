<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Mail;
use Validator;
use DB,Session,Input;
class RegisterController extends Controller
{
	//注册
	function reg_pro(Request $request)
	{
        //接值
		$data = Request::all();
		//
		//头像上传
		$file = Input::file('u_img');
		//var_dump($file);die;
		$allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only storage png, jpg or gif.'];
        }
		$destinationPath = 'storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
       // print_r($fileName);die;
        $data['u_img']=$fileName;
		$data['u_integral']=100;
		$time = date('Y-m-d');
		$data['u_date'] = $time;
		unset($data['_token']);
		DB::table("user")->insert($data);
		echo "<script>alert('首次注册并登录赠送您100积分，快去登录吧！');location.href='login';</script>";

	}

	//登录
	public function log_hpro()
	{
		//进行后台登录的验证
		$data = $_GET;
		//print_r($data);
		//
		$users = DB::table('user')->where($data)->first();
		//print_r($users);die;
		//进行非逻辑判断
		if($users){
			Session::put('u_name',$data['u_name']);
			Session::put('u_id',$users['u_id']);
			Session::save();
			$data = DB::table('user')->where('u_id',$users['u_id'])->get();
			//print_r($data);die;
			$times=date('Y-m-d',time());
			$points = $data[0]['u_integral']+=10;
			if($data[0]['u_date']!=$times){
				DB::table('user')->where('u_id',$data[0]['u_id'])->update(['u_date'=>$times,'u_integral'=>$points]);
			}
			echo 1;die;
		} else {
			echo 0;die;
		}
	}

	//忘记密码
	public function change_pwd()
	{
		return view('Home/getpwd1');
	}
	/**
	 * 邮箱获取验证码
	 * @return [type] [description]
	 */
	public function getpwd2()
	{
		$c = $data['u_email']=$_POST['u_email'];
		$yzm=rand(1000,9999);
		//echo $yzm;die;
		$data = array('u_yzm' => $yzm);
		//print_r($data);die;
        $a=DB::table('user')->where('u_email',$c)->update($data);
        //echo $a;die;
        if($a){
        	$data=['name'=>'jnn','url'=>'www.baidu.com','u_yzm'=>$yzm,'u_email'=>$c];
			$re=Mail::send('Home/emailyzm', $data, function($message) use($data)
			{
			    $message->to($data['u_email'],$data['name'])->subject("您的验证码");
			});
			//echo $re;die;
			if($re){
				return view('Home/getpwd2')->with('u_email',$c);
			}else{
				echo 0;
			}
        }
	}
	/**
	 * 验证
	 */
	public function getpwd3(){
		$c=$_GET['u_email'];
		//echo $c;die;
        $a=$_GET['u_yzm'];

        $str=DB::table('user')->where('u_email',$c)->get();

        //print_r($str);die;
        if ($str[0]['u_yzm']==$a) {
        	echo 1;
        }else{
            echo 0;
        }
	}
	/**
	 * 修改
	 */
	public function getpwd5(){
		$u_email = $_GET['u_email'];
		return view('Home/getpwd5',['u_email'=>$u_email]);
	}
	public function getpwd4(){
		$c=$arr['u_email']=$_POST['u_email'];
		//echo $c;die;
        $a=$arr['u_pwd1']=$_POST['u_pwd1'];
        $data = array('u_pwd' => $a);
		//print_r($data);die;
        $ress=DB::table('user')->where('u_email',$c)->update($data);
        if($ress){
        	return redirect('login');
        }else{
        	echo 'error';
        }
	}

}
?>
