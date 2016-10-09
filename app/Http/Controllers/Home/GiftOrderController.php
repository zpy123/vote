<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use DB,Session,Request;
class GiftOrderController extends Controller{
    //兑换礼品
    public function GiftExchange()
    {
        //判断登录状态
        $u_id = Session::get('u_id');
        // dd($u_id);
        if ($u_id) {
            //接受兑换的礼品id,积分
            $g_id = Request::input('g_id');
            $g_point = Request::input('g_point');
            $g_name = Request::input('g_name');
            // dd($data);

            //根据id查询数据，判断积分是否足够
            $user = DB::table('user')->where('u_id',$u_id)->first();
            // dd($user);
            $u_point = $user['u_integral'];

            //判断积分是否足够
            if ($u_point>=$g_point) {
                $data['g_id'] = $g_id;
                $data['g_name'] = $g_name;
                $data['g_point'] = $g_point;
                //调用收货地址页面
                return view('Home/orderGift',['order_data'=>$data]);
            }else{
                echo "<script>alert('您的积分貌似不太够，再逛逛吧！');window.location.href='GiftList';</script>";
            }

        }else{
            echo "<script>alert('请先登录！');window.location.href='../login';</script>";
        }
    }

    /*
     * 生成订单
     */
    public function exchangeOrder()
    {
        $data = Request::all();
        // dd($data);

        $region_data = DB::table('regions')->get();
        // dd($region_data);
        $str = "";
        foreach ($region_data as $k => $v) {
            if ($data['province'] == $v['region_id']) {
                $str .= $v['region_name'];
            }
            if ($data['city'] == $v['region_id']) {
                $str .= $v['region_name'];
            }
            if ($data['county'] == $v['region_id']) {
                $str .= $v['region_name'];
            }
        }
        $str .= $data['addre'];
        //兑换礼品，生成订单，更新数据
        $arr = array(
            'g_id'  =>  $data['g_id'],
            'u_id'  =>  Session::get('u_id'),
            'gl_num'  =>  time(),
            'gl_phone'  =>  $data['gl_phone'],
            'gl_address'    =>  $str,
            'gl_status'  =>  1,
        );
        // dd($data);

        //生成订单
        $bool = DB::table('giftlist')->insert($arr);
        //订单生成成功，修改用户积分
        if ($bool) {
            $content = "尊敬的用户" . Session::get('u_name') . "你已经下单成功(" . $data['g_name'] . ")，我们什么时候想起来就发货【爱要不要】";
            $bool = file_get_contents("http://api.jisuapi.com/sms/send?mobile=" . $arr['gl_phone'] . "&content=" . $content . "&appkey=12fbe59e0646a32b");
            if ($bool) {
                $user = DB::table('user')->where('u_id',$arr['u_id'])->first();
                $u_point = $user['u_integral'];
                $g_point = $data['g_point'];
                DB::table('user')->where('u_id',$arr['u_id'])->update(array('u_integral'=>$u_point-$g_point));
                echo "<script>alert('下单成功');location.href='GiftList'</script>";
            }
        }else{
            echo "<script>alert('手机号有问题');location.href='GiftList'</script>";
        }
    }
}
