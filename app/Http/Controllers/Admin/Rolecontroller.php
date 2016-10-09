<?php
namespace App\Http\Controllers\Admin;
use DB;
use Request;

use App\Http\Controllers\Controller;
class RoleController extends Controller{

        public function roleAdd()
        {
                $rolename = isset($_GET['rolename']) ? $_GET['rolename'] : '';
                if($rolename){
                        //echo $rolename;
                        $data = DB::table('role')->where('role_name',$rolename)->get();
                        if($data){
                                echo 0;die;
                        }else{
                                $re = DB::table('role')->insert(['role_name'=>$rolename]);
                                if(empty($re)){
                                        echo 1;die;
                                }else{
                                        echo 2;die;
                                }
                        }
                }else{
                        $data = DB::table('role')->where('role_id','!=',0)->lists('role_name');
                        //print_r($data);die;
                        return view('Admin/roleAdd')->with('data',$data);
                }
        }

        public function roleList()
        {
                //$data['owner'] = DB::table('owner')->where('manager_id','!=',0)->get();
                $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
                return view('Admin/roleList')->with('data',$data);
        }

        public function roleTask()
        {
                $data['owner'] = DB::table('owner')->where('manager_id','!=',0)->get();
                $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
                return view('Admin/roleTask')->with('data',$data);
        }

        public function roleTaskpro()
        {
                $manager_id = $_GET['manager_id'];
                //echo $manager_id;die;
                $role_id = $_GET['role_id'];
                //print_r($role_id);die;
                $arr = DB::table('owner_role')->where('man_id',$manager_id)->get();
                //print_r($role_id);die;
                foreach($role_id as $k =>$v){
                        foreach($arr as $kk => $vv){
                                //echo $v['role_id'];die;
                                if($v == $vv['role_id']){
                                        //echo 111;die;
                                        DB::table('owner_role')->where('man_id','=',$manager_id)->where('role_id','=',$v)->delete();
                                }
                        }
                }
                //print_r($role_id);die;
                foreach($role_id as $k => $v){
                        $data = [
                                'man_id' => $manager_id,
                                'role_id' => $v
                        ];
                        DB::table('owner_role')->insert($data);
                }
                echo 1;
        }

        public function roleDel(){
                $role_id = $_GET['role_id'];
                //echo $role_id;
                $res = DB::table('role')->where('role_id',$role_id)->delete();
                $res1 = DB::table('owner_role')->where('role_id',$role_id)->delete();
                echo 0;
        }
}
?>
