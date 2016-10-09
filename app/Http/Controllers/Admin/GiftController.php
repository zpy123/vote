<?php
namespace App\Http\Controllers\Admin;

use DB,Request;
use App\Http\Controllers\Controller;
class GiftController extends Controller{

    //添加礼品
	public function Gift(){
        @$data = Request::input();
        if (empty($data)) {
            return view('Admin/giftadd');
        }else{
            //处理文件上传
            $images = Request::file('g_img');
            // print_r($images);die;
            $filedir="upload/article-img/"; //定义图片上传路径

            $imagesName=$images->getClientOriginalName(); //获取上传图片的文件名
            $images->move($filedir,$imagesName); //使用move 方法移动文件

            //获取文件名
            $g_img = $filedir.$imagesName;
            $data['g_img']=$g_img;
            unset($data['_token']);

            // print_r($data);
            //信息入库
            $rs = DB::table('gift')->insert($data);
            if ($rs) {
                return redirect('GiftShow');
            }else{
                echo "添加失败";
            }
        }
	}

    //礼品列表
    public function GiftShow()
    {
        //查询数据
        $gift = DB::table('gift')->get();
        // print_r($gift);die;
        return view('Admin/giftshow')->with('arr',$gift);
    }

    //删除礼品
    public function GiftListDel()
    {
        //接受数据
        $id = Request::get('g_id');
        // print_r($id);die;

        //删除数据
        $result = DB::table('gift')->where('g_id','=',$id)->delete();
        if ($result) {
            return redirect('GiftShow');
        }else{
            echo "0";
        }
    }
}
?>
