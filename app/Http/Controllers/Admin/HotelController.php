<?php

namespace App\Http\Controllers\Admin;

// use Request;
// use DB, Redirect, Input, Response, Request;
use DB, Redirect, Input, Response, Request,Session;

// use UploadedFile;

use App\Http\Controllers\Controller;
header("content-type:text/html;charset=utf8");
/**
 * 酒店管理
 */
class HotelController extends Controller{
	// 酒店表单页面
	public function index()
  {
    	return view('Admin/hotelad');
	}
	// 酒店添加
	public function insert()
	{
		// 地区三字段
		$province = Request::input('province');
		$city = Request::input('city');
		$county = Request::input('county');
		// $pub_address = $province.','.$city.','.$county;
		// $pub_address = implode(',', $address);
		// print_r($pub_address);die;
		$file = Input::file('Pub_img');
		$name = Request::input('Pub_name');
		$boss = Request::input('Pub_boss');
		$phone = Request::input('Pub_phone');
		$email = Request::input('Pub_email');
		//echo $email;die;
		$content = Request::input('Pub_content');
		$pub_address = Request::input('pub_address');
		$room = Request::input('Pub_room');
		$minprice = Request::input('Pub_minprice');
		$maxprice = Request::input('Pub_maxprice');
		$allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }
		$destinationPath = 'storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
	$province_name = DB::table('regions')->where('region_id',$province)->lists('region_name');
	$city_name = DB::table('regions')->where('region_id',$city)->lists('region_name');
	$county_name = DB::table('regions')->where('region_id',$county)->lists('region_name');
	$str = $province_name[0].','.$city_name[0].','.$county_name[0];
	//echo $str;die;
	DB::table('region')->insert(['province_name'=>$province_name[0],'city_name'=>$city_name[0],'county_name'=>$county_name[0]]);
	$result=DB::table('guest')->insert(['pub_name'=>$name,'pub_boss'=>$boss,'pub_email'=>$email,'pub_phone'=>$phone,'pub_content'=>$content,'pub_rooms'=>$room,'pub_minprice'=>$minprice,'pub_maxprice'=>$maxprice,'pub_img'=>$fileName,'region_name'=>$str,'pub_address'=>$pub_address]);
        if($result){
			return Redirect('/hotellst');
		}else{
			return view('/hotelform');
		}
   }
   /**
    * 酒店展示列表
    * @return [arr] [res]
    */
   public function pub_list()
   {
   	$res = DB::table('guest')->get();
        return view("Admin/hotellst")->with('arr',$res);
   }

   //酒店验证唯一
   public function hotel_name(){
      $pub_name=$_GET['Pub_name'];
      $re=DB::table("guest")->where('pub_name',$pub_name)->first();
      //var_dump($re);die;
      if($re){
        echo 1;
      }else{
        echo 0;
      }
     }
   /**
    * 删除
    * @return [hotel]
    */
   public function pub_delete()
   {
   		$id = $_GET['pub_id'];
		DB::table('guest')->where('pub_id',$id)->delete();
		return redirect("/hotellst");
   }
   /**
    * 酒店房间详情
    * @return [type] [description]
    */
   public function pub_look()
   {
   		$id = isset($_GET['pub_id'])?$_GET['pub_id']:1;
   		$res = DB::table('guest')
   						->join('guest_rtype','guest.pub_id','=','guest_rtype.pub_id')
   						->join('rtype','rtype.rt_id','=','guest_rtype.rt_id')
   						->where('guest.pub_id',$id)
   						->get();
   		// print_r($res);die;
   		return view("Admin/hotelrooms")->with('arr',$res);
   }
   /**
    * 酒店电话信息即点即改
    * @return [type] [description]
    */
   public function pub_update()
   {
      $data['measure_unit'] = $_GET['measure_unit'];
      $data['pub_id'] = $_GET['id'];
      $arr = DB::table('guest')
            ->where('pub_id', $data['pub_id'])
            ->update(['pub_phone' => $data['measure_unit']]);
      if ($arr) {
          echo 1;
      } else {
          echo 0;
      }
   }
   /**
    * 酒店房型管理
    * @return [type] [description]
    */
   public function pub_gethome()
   {
      $id = isset($_GET['pub_id'])?$_GET['pub_id']:1;
      $res = DB::table('guest')->where('pub_id','=',$id)->first();
      $res1 = DB::table('rtype')->get();
      return view('Admin/hotelgetroom')->with('ar',$res1)->with('arr',$res);
   }
   // 酒店房型的添加
  public function pub_getroom()
  {
    $data['pub_id'] = Request::input('pub_id');
    $data['rt_id'] = Request::input('rid');

    $res = DB::table('guest_rtype')->where('pub_id',$data['pub_id'])->get();
    // print_r($res);die;
    foreach ($res as $k => $v) {
      if ($v['pub_id']==$data['pub_id']) {
        $res = DB::table('guest_rtype')->where('pub_id',$data['pub_id'])->delete();
      }
    }
    $arr = array();
    for($i=0;$i<count($data['rt_id']);$i++){
      $arr['pub_id'] = $data['pub_id'];
      $arr['rt_id'] = $data['rt_id'][$i];
      $re = DB::table('guest_rtype')->insert($arr);
    }
    if ($re){
      return redirect('/hotellst');
    }
  }

}
?>
