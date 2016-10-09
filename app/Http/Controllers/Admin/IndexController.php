<?php
namespace App\Http\Controllers\Admin;
header('content-type:text/html;charset=utf8');
use App\Http\Controllers\Controller;
use  DB,Response,Request,Session;
use app\Category;

class IndexController extends Controller{

	public function index()
	{
		$manager_name = Session::get('manager_name');
		$manager_id = Session::get('manager_id');
		if(empty($manager_name)&&empty($manager_id)){
			echo "<script>alert('请先登录!!!');location.href='admin_'</script>";
		}else{
			//echo $manager_id;die;
			$data = DB::table('owner')->where('manager_name',$manager_name)->lists('man_uname');
			//echo $manager_name;die;
			//var_dump($data);die;
			$name = $data[0];
			Session::put('name',$name);
			//echo $name;die;
			//$data = $this->main($manager_id);

				return view('Admin/zhuti');

		}

	}

     //
     // * 左侧菜单栏
     // * @return [type] [description]
     // */
     // ublic function main(){
     //     //获取所有权限
     // anager_id = Session::get('manager_id');
     // ft=new \App\Category();
     //     $data = $left->getNode($manager_id);
     //     //print_r($data);die;
     //
     //     return view('Admin/main')->with('data',$data);
     // }

}
?>
