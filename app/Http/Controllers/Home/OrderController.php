<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use DB,Session;
class OrderController extends Controller
{
        public function my_order(){
                $u_id = Session::get('u_id');
		//echo $u_id;die;
		$u_name = Session::get('u_name');
                if(empty($u_id)&&empty($u_name)){
                        echo "<script>alert('您还没有登录，请先去登陆哦！');location.href='login';</script>";
                }else{
                        $data1 = DB::table('order')->join('user','order.u_id','=','user.u_id') ->orderBy('o_status', 'asc')->where('order.u_id',$u_id)->get();

                        $data2 = DB::table('order')->join('user','order.u_id','=','user.u_id') ->orderBy('o_status', 'asc')->where('order.u_id',$u_id)->where('o_status','!=',3)->get();

                        $data3 = DB::table('order')->join('user','order.u_id','=','user.u_id') ->orderBy('o_status', 'asc')->where('order.u_id',$u_id)->where('o_status','=',3)->get();

                        $data = [
                                'data1' => $data1,
                                'data2' => $data2,
                                'data3' => $data3
                        ];
                        $times = date('Y-m-d');
                        //echo $times;die;
                        return view('Home/my_order',['times'=>$times])->with('data',$data);
                }
        }


}
?>
