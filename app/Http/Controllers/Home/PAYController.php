<?php

namespace App\Http\Controllers\home;
header("content-type:text/html;charset=utf-8");
use App\Http\Controllers\Controller;
use DB,Request,Session;
class PAYController extends Controller
{
	//接收订单号，查询订单信息，修改支付信息
	//支付宝支付
	public function pay()
	{
		ob_clean();
		header("content-type:text/html;charset=utf8");
		// ******************************************************配置 start*************************************************************************************************************************
		//↓↓↓↓↓↓↓↓↓↓请在这里配置您的基本信息↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
		//合作身份者id，以2088开头的16位纯数字
		$alipay_config['partner']		= '2088002075883504';
		//收款支付宝账号
		$alipay_config['seller_email']	= 'li1209@126.com';
		//安全检验码，以数字和字母组成的32位字符
		$alipay_config['key']			= 'y8z1t3vey08bgkzlw78u9cbc4pizy2sj';
		//↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
		//签名方式 不需修改
		$alipay_config['sign_type']    = strtoupper('MD5');
		//字符编码格式 目前支持 gbk 或 utf-8
		//$alipay_config['input_charset']= strtolower('utf-8');
		//ca证书路径地址，用于curl中ssl校验
		//请保证cacert.pem文件在当前文件夹目录中
		$alipay_config['cacert']    = getcwd().'\\cacert.pem';
		//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
		$alipay_config['transport']    = 'http';
		// ******************************************************配置 end*************************************************************************************************************************

		// ******************************************************请求参数拼接 start*************************************************************************************************************************
		$parameter = array(
			"service" => "create_direct_pay_by_user",
			"partner" => $alipay_config['partner'], // 合作身份者id
			"seller_email" => $alipay_config['seller_email'], // 收款支付宝账号
			"payment_type"	=> '1', // 支付类型
			"notify_url"	=> "http://bw.com133.com/notify_url.php", // 服务器异步通知页面路径
			"return_url"	=> "http://bw.com133.com/notify_url.php", // 页面跳转同步通知页面路径
			"out_trade_no"	=> $_GET['o_num'],// 商户网站订单系统中唯一订单号
			"subject"	=> "测试订单", // 订单名称
			"total_fee"	=> "0.01", // 付款金额
			"body"	=> "", // 订单描述 可选
			"show_url"	=> "", // 商品展示地址 可选
			"anti_phishing_key"	=> "", // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
			"exter_invoke_ip"	=> "", // 客户端的IP地址
			"_input_charset"	=> 'utf-8', // 字符编码格式
			);
		// 去除值为空的参数
		foreach ($parameter as $k => $v) {
			if (empty($v)) {
				unset($parameter[$k]);
			}
		}
		// 参数排序
		ksort($parameter);
		reset($parameter);

		// 拼接获得sign
		$str = "";
		foreach ($parameter as $k => $v) {
			if (empty($str)) {
				$str .= $k . "=" . $v;
			} else {
				$str .= "&" . $k . "=" . $v;
			}
		}
		$parameter['sign'] = md5($str . $alipay_config['key']);
		$parameter['sign_type'] = $alipay_config['sign_type'];
		// ******************************************************请求参数拼接 end*************************************************************************************************************************


		// ******************************************************模拟请求 start*************************************************************************************************************************
		$sHtml = "<form id='alipaysubmit' name='alipaysubmit' action='https://mapi.alipay.com/gateway.do?_input_charset=utf-8' method='get'>";
		foreach ($parameter as $k => $v) {
			$sHtml.= "<input type='hidden' name='" . $k . "' value='" . $v . "'/>";
		}

		$sHtml = $sHtml."<script>document.forms['alipaysubmit'].submit();</script>";

		// ******************************************************模拟请求 end*************************************************************************************************************************
		echo $sHtml;

	}

	function notify_url()
	{
		echo 'notify_url';
		print_r($_GET);
	}

	function return_url()
	{
		$u_id = Session::get('u_id');
    		    $arr3 = array(
    			    'o_status'=>'2'
    			    );
    		    // $this->db->where("order_bian=".$_GET['out_trade_no'])->update('order',$arr3);
    		    $data = DB::table('order')->where('o_num',$_GET['o_num'])->get();
		  // print_r($data);die;
		   $jifen = $data[0]['o_price']/10;
		   //echo $jifen;die;
		    $pub_id = DB::table('guest')->where('pub_name',$data[0]['o_pubname'])->lists('pub_id');
    		    DB::table('guest')->where('pub_id',$pub_id[0])->increment('pub_xiao');
		    $days = $this->diffBetweenTwoDays($data[0]['o_start'], $data[0]['o_end']);
		    $tian = $days+1;
		    $arr = DB::table('user')->where('u_id',$data[0]['u_id'])->get();
    		   DB::table('order')->where('o_status',0)->where('u_id',$u_id)->where('o_num',$_GET['o_num'])->update($arr3);
		    $name = $arr[0]['u_name'];
		    //echo $name;die;
		   // echo $arr[0]['u_id'];die;
		    $start = $data[0]['o_start'];
		    $end = $data[0]['o_end'];
		    $times = $start."至".$end;
		    $str = $name."你好，恭喜您成功预定美假微酒店，".$times."，共计".$tian."天，请您及时入住，逾期不办理退款。【姜楠楠】";
		    $url = "http://api.jisuapi.com/sms/send?mobile=".$arr[0]['u_phone']."&content=".$str."&appkey=1298ed086ddab193";
		   // echo $url;die;
		    $json = file_get_contents($url);
		    //print_r($json);die;
		    $u_jifen = $arr[0]['u_integral'];
		    $jifens = $u_jifen+$jifen;
		    //echo $jifens;die;
		    DB::table('user')->where('u_id',$arr[0]['u_id'])->update(['u_integral'=>$jifens]);
		   return redirect('my_order');


	}
	public function diffBetweenTwoDays ($day1, $day2)
	{
	  $second1 = strtotime($day1);
	  $second2 = strtotime($day2);

	  if ($second1 < $second2) {
	    $tmp = $second2;
	    $second2 = $second1;
	    $second1 = $tmp;
	  }
	  return ($second1 - $second2) / 86400;
	}
}
