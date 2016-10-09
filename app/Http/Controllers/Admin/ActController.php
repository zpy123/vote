<?php
namespace App\Http\Controllers\Admin;
use DB,Request;
use App\Http\Controllers\Controller;
class ActController extends Controller{
    //新增活动页面
        public function AddAct(){
            return view('Admin/AddAct');
        }
    //活动数据入库
    public function InsertAct(){
        $data=Request::input();
        //print_r($data);
        $file=Request::file('act_img');
        //print_r($file);
        $filedir="upload/article-img/"; //定义图片上传路径
        $fileName=$file->getClientOriginalName(); //获取上传图片的文件名
        $file->move($filedir,$fileName); //使用move 方法移动文件.
        $newName=$filedir.$fileName;
        $data['act_img']=$newName;
        unset($data['_token']);
        $re=DB::table('activity')->insert($data);
        if($re){
            return view('Admin/ActList');
        }else{
            echo "<script>alert('新增活动失败')</script>";
        }
    }
    //活动展示列表
    public function ActList(){
        $re=DB::table('activity')->get();
        //print_r($re);die;
        return view('Admin/ActList')->with('re',$re);
    }
    //活动删除
    public function DelAct(){
        $act_id=$_GET['act_id'];
        $re=DB::table('activity')->where('act_id','=',$act_id)->delete();
        if($re){
            return  redirect('myadmin/ActList');
        }
    }

    public function address_list(){
            $data = DB::table('region')->get();
            return view('Admin/address_list')->with('data',$data);
    }
}
