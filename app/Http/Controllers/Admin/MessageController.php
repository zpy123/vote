<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use DB, Input, Response, Request, Session;

class MessageController extends Controller{
	//列表
	public function message_list(){
		$arr=DB::table("message")->paginate(2);
		//var_dump($arr);die;
		return view("Admin/message_list",['arr'=>$arr]);
	}
	//删除
	 public function deletes(){
	 	$id=$_GET['id'];
	 	DB::table('message')->where('id', $id)->delete();
	 	return redirect("/message_list");
	 }
}
?>