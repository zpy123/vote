<?php
namespace App\Http\Controllers\Admin;
use DB;
use app\privilege;
use Request;

use App\Http\Controllers\Controller;
class PrivilegeController extends Controller{

        //后台权限列表
        public function privilegeAdd()
        {
                $data = isset($_GET) ? $_GET  : '';
                if($data){
                        //unset($data['_token']);
                        //print_r($data);die;
                        $arr = DB::table('privilege')->where('pri_name',$data['pri_name'])->get();
                        //dd($arr);
                        if(empty($arr)){
                                DB::table('privilege')->insert($data);
                                echo 1;die;
                        }else{
                                echo 0;die;
                        }
                }else{
                        $model=new \App\PrivilegeModel();
                        $data = $model->lst();
                        //print_r($data);die;
                        return view('Admin/privilegeAdd')->with('data',$data);
                }

        }

        public function privilegeList(){
                $model=new \App\PrivilegeModel();
                $data['privilege'] = $model->lst();
                //print_r($data['privilege']);die;
                return view('Admin/privilegeList')->with('data',$data);

        }

        // public function roleprivilegeList(){
        //         $data['role'] = DB::table('role')
        //         ->join('role_privilege','role.role_id','=','role_privilege.role_id')
        //         ->get();
        //         $data['privilege'] = DB::table('role_privilege')
        //         ->join('privilege','role_privilege.pri_id','=','privilege.pri_id')
        //         ->get();
        //         //print_r($data['privilege']);die;
        //         $arr = array();
        //         $str = '';
        //         foreach($data['role'] as $k =>$v){
        //                 foreach($data['privilege'] as $kk =>$vv){
        //                         if($v['pri_id'] == $vv['pri_id']){
        //                                 $arr[$k]['role_name'] = $v['role_name'];
        //                                 $str = $str.','.$vv['pri_name'];
        //                                  $arr[$k]['pri_name'] = $str;
        //                         }
        //                 }
        //         }
        //         print_r($arr);die;
        //         //return view('Admin/roleprivilegeList')->with('data',$data);
        //
        // }

        public function privilegeDel(){
                $pri_id = $_GET['pri_id'];
                //echo $privilege_id;
                $res = DB::table('privilege')->where('pri_id',$pri_id)->delete();
                $res1 = DB::table('role_privilege')->where('pri_id',$pri_id)->delete();
                echo 0;
        }

        public function privilegeTask(){
                $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
                $model=new \App\PrivilegeModel();
                $data['privilege'] = $model->lst();
                return view('Admin/privilegeTask')->with('data',$data);
        }

        public function privilegeTaskpro(){
                $role_id = $_GET['role_id'];
                $pri_id = $_GET['pri_id'];
                $arr = DB::table('role_privilege')->where('role_id',$role_id)->get();
                //print_r($pri_id);die;
                foreach($arr as $k =>$v){
                        foreach($pri_id as $kk => $vv){
                                //echo $v['role_id'];die;
                                if($v['pri_id'] == $vv){
                                        //echo 111;die;
                                        DB::table('role_privilege')->where('role_id','=',$role_id)->delete();
                                }
                        }
                }
                //print_r($role_id);die;
                foreach($pri_id as $k => $v){
                        $data = [
                                'role_id' => $role_id,
                                'pri_id' => $v
                        ];
                        DB::table('role_privilege')->insert($data);
                }
                echo 0;
        }
        public function privilegeChecked()
        {
                $role_id = $_GET['role_id'];
                $arr = DB::table('role_privilege')->where('role_id','=',$role_id)->get();
                // print_r($res);die;
                for($i=0;$i<count($arr);$i++){
                    $new_arr[] = $arr[$i]['pri_id'];
                }
                //print_r($new_arr);die;
                // print_r($data['new_arr']);die;
                $data['role'] = DB::table('role')->where('role_id','!=',0)->get();
                $model=new \App\PrivilegeModel();
                $data['privilege'] = $model->lst();
                return view('Admin/priChecked')->with('data',$data)->with('new_arr',$new_arr);
        }

}
?>
