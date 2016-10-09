<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use DB,Session,Request;
class IndexController extends Controller{
	public function index(){
		return view('Home/welcome');
	}



	//最新活动
	public function Activitys(){
		$date = date('Y-m-d',time());
		$arr = DB::table('activity')->get();
		return view('Home/Activitys')->with('arr',$arr)->with('date',$date);
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
	public function zhong(){
		return view('Home/zhong');
	}
	public function kefu(){
		return view('Home/kefu');
	}
	public function message(){
		return view('Home/message');
	}
	public function message_add(){
		$content=$_POST['content'];
	 	$email=$_POST['email'];
	 	//添加入库
	 	$res=DB::table('message')->insert(['content' => $content,'email' => $email]);
	 	//var_dump($res);die;
	 	if($res){
	 		return "<script>alert('谢谢您提出的问题与建议,我们会及时的改进,感谢您的参与');location.href='message'</script>";
	 	}

	}
	//立即免费注册
	public function register(){
		return view('Home/register');
	}

	public function my_gift(){
		// 查询数据
		$u_id = Session::get('u_id');
		// 判断登录状态
		if ($u_id) {
			//查询全部数据
			$all = DB::table('giftlist')
			->join('user','giftlist.u_id','=','user.u_id')
			->join('gift','giftlist.g_id','=','gift.g_id')
			->where('giftlist.u_id',$u_id)
			->select('giftlist.*','gift.g_name','user.u_name')
			->get();
			//查询待收货数据
			$dsh = DB::table('giftlist')
			->join('user','giftlist.u_id','=','user.u_id')
			->join('gift','giftlist.g_id','=','gift.g_id')
			->where('gl_status',1)
			->where('giftlist.u_id',$u_id)
			->select('giftlist.*','gift.g_name','user.u_name')
			->get();
			//查询已完成数据
			$down = DB::table('giftlist')
			->join('user','giftlist.u_id','=','user.u_id')
			->join('gift','giftlist.g_id','=','gift.g_id')
			->where('gl_status',2)
			->where('giftlist.u_id',$u_id)
			->select('giftlist.*','gift.g_name','user.u_name')
			->get();
			// dd($all);
			return view('Home/my_gift')->with('all',$all)->with('dsh',$dsh)->with('down',$down);
		}else{
			echo "<script>alert('请先登录！');window.location.href='login';</script>";
		}
	}
	public function my_collection(){
		$u_id = Session::get('u_id');
		$data = DB::table('collection')
		->join('guest','collection.pub_id','=','guest.pub_id')
		->where('collection.u_id',$u_id)->get();
		//$num = DB::table('order')->where('u_id',$u_id)->where('o_pubname',$data)->count();
		//print_r($data);die;
		return view('Home/my_collection')->with('data',$data);
	}

	public function collection(){
		$u_id = Session::get('u_id');
		$pub_id = $_GET['pub_id'];
		$arr = DB::table('collection')->where('u_id',$u_id)->where('pub_id',$pub_id)->get();
		if($arr){
			echo 2;
		}else{
			$re = DB::table('collection')->insert(['u_id'=>$u_id,'pub_id'=>$pub_id]);

			if($re){
				echo 1;
			}else{
				echo 0;
			}
		}

	}
	public function qucollection(){
		$u_id = Session::get('u_id');
		$pub_id = $_GET['pub_id'];
		$arr = DB::table('collection')->where(['u_id'=>$u_id,'pub_id'=>$pub_id])->delete();
		echo 1;
	}
	public function loginOUT(){
		Session::forget('u_id');
		Session::forget('u_name');
		return view('Home/login');
	}
}
?>
