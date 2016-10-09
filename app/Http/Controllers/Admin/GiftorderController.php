<?php
namespace App\Http\Controllers\Admin;
use DB,Request;
use App\Http\Controllers\Controller;
class GiftorderController extends Controller{
//礼品订单展示
    public function GiftList(){
        $re=DB::table('giftlist')
            ->join('user','giftlist.u_id','=','user.u_id')
            ->join('gift','giftlist.g_id','=','gift.g_id')
            ->select('giftlist.*','gift.g_name','user.u_name')
            ->get();
        //print_r($re);die;
        return view('Admin/GiftList')->with('re',$re);
    }
    //礼品订单删除
    public function DelGift(){
        $gl_id=$_GET['gl_id'];
        $re=DB::table('giftlist')->where('gl_id','=',$gl_id)->delete();
        if($re){
            return  redirect('myadmin/GiftList');
        }
    }
}
?>