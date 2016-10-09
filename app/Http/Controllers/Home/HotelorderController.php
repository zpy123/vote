<?php
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

use DB,Session,Request;
class HotelorderController extends Controller{

        //预订酒店
	public function CityList(){
		$arr = DB::table('region')->get();
		// print_r($arr);die;
		return view('Home/CityList')->with('arr',$arr);
	}
	//酒店列表
        public function hotellist(){
		$data = $_GET;
		//print_r($data);die;
		// $res = DB::table('guest')->where('region_name',$data['region'])->lists('region_id');
		// print_r($res);die;
		$region = $data['region'];

		$arr = DB::table('guest')->where('region_name','like','%'.$region.'%')->get();
		DB::table('cha_day')->update(['cha_start'=>$data['checkInDate'],'cha_end'=>$data['checkOutDate']]);
		//$arr = DB::table('guest')->select('region_name as $region')->get();
		//print_r($arr);die;
		 return view('Home/hotellist')->with('arr',$arr);
	}
	//展示酒店对应的房型列表
	public function hotel(){
		if(!Request::get('id')){
			$id = Session::get('pub_id');
			//echo $id;die;
			$data = DB::table('guest_rtype')
			->join('rtype','guest_rtype.rt_id','=','rtype.rt_id')
			->where('guest_rtype.pub_id',$id)
			->get();
			//print_r($data);die;
			$address = DB::table('guest')->where('pub_id',$id)->lists('pub_address');
			//print_r($address);die;
			//Session::put('pub_id',$id);
			$arr = DB::table('cha_day')->get();
			$arr = DB::table('cha_day')->get();
			$time1=strtotime($arr[0]['cha_start']);
			$time2=strtotime($arr[0]['cha_end']);
			//echo $time2;die;
			$date_time_array1 = getdate($time1);
			$date_time_array2 = getdate($time2);
			$month1 = $date_time_array1["mon"];
			$day1 = $date_time_array1["mday"];
			$month2 = $date_time_array2["mon"];
			$day2 = $date_time_array2["mday"];
			$start = $month1.'月'.$day1.'日';
			//echo $start;die;
			$end	 = $month2.'月'.$day2.'日';
			//print_r($arr);die;
			return view('Home/hotel',['address'=>$address,'cha_start'=>$start,
			'cha_end'=>$end,'cha_start1'=>$arr[0]['cha_start'],
			'cha_end1'=>$arr[0]['cha_end']])->with('data',$data);
		}else{
			$id = $_GET['id'];

			//echo $id;die;
			$data = DB::table('guest_rtype')
			->join('rtype','guest_rtype.rt_id','=','rtype.rt_id')
			->where('guest_rtype.pub_id',$id)
			->get();
			//print_r($data);die;
			$address = DB::table('guest')->where('pub_id',$id)->lists('pub_address');
			//print_r($address);die;
			$arr = DB::table('cha_day')->get();
			$time1=strtotime($arr[0]['cha_start']);
			$time2=strtotime($arr[0]['cha_end']);
			//echo $time2;die;
			$date_time_array1 = getdate($time1);
			$date_time_array2 = getdate($time2);
			$month1 = $date_time_array1["mon"];
			$day1 = $date_time_array1["mday"];
			$month2 = $date_time_array2["mon"];
			$day2 = $date_time_array2["mday"];
			Session::put('pub_id',$id);
			$start = $month1.'月'.$day1.'日';
			//echo $start;die;
			$end	 = $month2.'月'.$day2.'日';
			//print_r($arr);die;
			return view('Home/hotel',['address'=>$address,'cha_start'=>$start,
			'cha_end'=>$end,'cha_start1'=>$arr[0]['cha_start'],
			'cha_end1'=>$arr[0]['cha_end']])->with('data',$data);
		}
	}
	/**
	 * 酒店预订（评论）
	 * @return [type] [description]
	 */
	public function hotelreview()
	{
		$u_id = Session::get('u_id');
		$pub_id = Session::get('pub_id');
		$data=DB::table('user')
		->join('comment','user.u_id','=','comment.u_id')
		->where('user.u_id',$u_id)->where('pub_id',$pub_id)->simplePaginate(3);
		//print_r($user);die;

		return view('Home/hotelreview')->with('data',$data);
	}
	/**
	 * 酒店评论添加
	 */
	public function comment_pro()
	{
		$u_name = Session::get('u_name');
		$u_id = Session::get('u_id');
		$pub_id = Session::get('pub_id');
		if($u_id=='' && $u_name==''){
			echo "<script>alert('您还没有登录，请先去登陆哦！');location.href='login';</script>";
		}else{
			//接值
			$data=Request::all();
			$data['u_id']=$u_id;
			$data['pub_id'] = $pub_id;
			date_default_timezone_set('PRC');
			$data['com_time']=date('Y-m-d H:i:s',time());
			//print_r($data);die;
			$pub_name = DB::table('guest')->where('pub_id',$pub_id)->lists('pub_name');
			$arr = DB::table('order')->where('o_pubname',$pub_name[0])->where('u_id',$u_id)->get();
			if(empty($arr)){
				echo 0;
			}else{
				$res = DB::table('comment')->where('pub_id',$pub_id)->where('u_id',$u_id)->get();
				if(!empty($res)){
					echo 1;
				}else{
					$re=DB::table('comment')->insert($data);
					echo 2;
				}

			}

		}

	}
	//酒店简介
	public function hotelinfo(){
		$id = Session::get('pub_id');
		$arr=DB::table('guest')->where('pub_id',$id)->get();
		return view('Home/hotelinfo')->with('arr',$arr);
	}

	//修改查找的时间
	public function day_update(){
		$data =  $_GET;
		//print_r($data);die;
		DB::table('cha_day')->update(['cha_start'=>$data['CheckInDate'],'cha_end'=>$data['CheckOutDate']]);
		return redirect('hotel');
	}

	//预定酒店
	public function yuding(){
		$u_id = Session::get('u_id');
		//echo $u_id;die;
		$u_name = Session::get('u_name');
		if(empty($u_id)&&empty($u_name)){
			echo 2;
		}else{
			$pub_id = Session::get('pub_id');
			$pub_name = DB::table('guest')->where('pub_id',$pub_id)->lists('pub_name');
			$day1 = $_GET['CheckInDate'];
			$day2 = $_GET['CheckOutDate'];
			$type = $_GET['type'];
			$price = $_GET['price'];
			$days = $this->diffBetweenTwoDays($day1, $day2);
			//$days = $diff;
			date_default_timezone_set('PRC');
			$time = date('Y-m-d H:i:s',time());
			//echo $time;die;
			$num = time().rand(100,999);
			//echo $num;die;
			$data = [
				'u_id' => $u_id,
				'o_num' => $num,
				'o_pubname' => $pub_name[0],
				'o_typename' => $type,
				'o_stime' => $time,
				'o_price' => $price,
				'o_status' => 0,
				'o_days' => $days,
				'o_start' => $day1,
				'o_end' => $day2
			];
			$res = DB::table('order')->insert($data);
			//$arr = DB::table('user')->where('u_id',$u_id)->get();
			//print_r($arr);die;

			if($res){
				echo 1;

			}else{
				echo 0;
			}
		}

	}
		/**
	 * 求两个日期之间相差的天数
	 * (针对1970年1月1日之后，求之前可以采用泰勒公式)
	 * @param string $day1
	 * @param string $day2
	 * @return number
	 */
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

	public function my_order(){
		return view('Home/my_order');
	}

	//地图接口
	public function hotelmap(){
		$pub_id = Session::get('pub_id');
		$address = DB::table('guest')->where('pub_id',$pub_id)->lists('pub_address');
		return view('Home/hotelmap')->with('address',$address[0]);
	}

	public function showxiang(){
		$o_id = $_GET['o_id'];
		$data = DB::table('order')->where('o_id',$o_id)->get();
		$str = json_encode($data);
		echo $str;
	}

	// public function ping(){
	// 	$o_num = $_GET['o_num'];
	//
	// }
}
?>
