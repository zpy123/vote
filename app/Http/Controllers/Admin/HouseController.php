<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use DB, Input, Response, Request, Session;

class HouseController extends Controller{
	//户型列表
	public function house_list(){
		$arr=DB::table("rtype")->paginate(2);
		//var_dump($arr);die;
		return view("Admin/house_list",['arr'=>$arr]);
	}
	//户型添加显示
	public function houseadd(){
		return view("Admin/houseadd");
	}

	//户型验证唯一
     	   public function house_name(){
     	   	$rt_name=$_GET['rt_name'];
     	   	$re=DB::table("rtype")->where('rt_name',$rt_name)->first();
     	   	//var_dump($re);die;
     	   	if($re){
     	   		echo 1;
     	   	}else{
     	   		echo 0;
     	   	}
     	   }
	//户型添加
	public function p_file(){
		$rt_name = Request::input('rt_name');
		$rt_type = Request::input('rt_type');
		$rt_price = Request::input('rt_price');
		$rt_count = Request::input('rt_count');
		$file = Input::file('rt_img');
		//var_dump($file);die;
		$allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only storage png, jpg or gif.'];
        }
		$destinationPath = 'Admin/storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
	$result=DB::table('rtype')->insert(['rt_name'=>$rt_name,'rt_type'=>$rt_type,'rt_price'=>$rt_price,'rt_count'=>$rt_count,'rt_img'=>$fileName]);        //var_dump($result);die;
        if($result){
			return Redirect('/house_list');
		}else{
			return view('images/inimg');
		}
   }
   //删除
	 public function delete(){
	 	$rt_id=$_GET['rt_id'];
	 	DB::table('rtype')->where('rt_id', $rt_id)->delete();
	 	return redirect("/house_list");
	 }
	 //修改页面
	 public function update(){
	 	//echo 11;die;
	 	 $rt_id=$_GET['rt_id'];
	 	 $arr=DB::table('rtype')->where('rt_id', $rt_id)->first();
	 	 return view('Admin/house_update',['arr'=>$arr]);
	 }
	//户型修改
	public function up_add(){
		$rt_id=$_POST['rt_id'];
		$rt_name=$_POST['rt_name'];
		$rt_type=$_POST['rt_type'];
		$rt_price=$_POST['rt_price'];
		$rt_count=$_POST['rt_count'];
		$file = Input::file('rt_img');
		//var_dump($file);die;
		$allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only storage png, jpg or gif.'];
        }
		$destinationPath = 'Admin/storage/uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);
        $data=array('rt_name'=>$rt_name,'rt_type'=>$rt_type,'rt_price'=>$rt_price,'rt_count'=>$rt_count,'rt_img'=>$filePath);
		$re=Db::table('rtype')->where('rt_id',$rt_id)->update($data);
        //var_dump($result);die;
        if($re){
			return Redirect('/house_list');
		}else{
			return view('images/inimg');
		}

	}
}
?>
