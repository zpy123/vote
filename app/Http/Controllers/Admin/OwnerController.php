<?php
namespace App\Http\Controllers\Admin;
use DB;
use Request;

use App\Http\Controllers\Controller;
class OwnerController extends Controller{

	public function index()
	{
		return view('Admin/form_owner');
	}
	/**
	 * 用户添加
	 * @return [type] [description]
	 */
	public function owner_pro()
	{
		//接值
		$data = Request::all();
		//print_r($data);die;
		unset($data['_token']);
		DB::table("owner")->insert($data);
		return redirect("list_owner");
	}
	/**
	 * 用户列表
	 * @return [type] [description]
	 */
	public function list_owner(){
		$results = DB::table('owner')->simplePaginate(3);
        return view("Admin/list_owner")->with('arr',$results);
	}
	/**
     * 删除用户
     */
    public function owner_del()
    {
        $manager_id=$_GET['manager_id'];
            //echo $manager_id;die;
            $re=DB::table('owner')->where('manager_id',$manager_id)->delete();
            if($re)
            {
                return Redirect("list_owner");
            }
    }
}
?>