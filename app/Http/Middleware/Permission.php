<?php
namespace App\Http\Middleware;

header('content-type:text/html;charset=utf8');
use Session,Closure,Request,DB;
use Illuminate\Contracts\View\Factory;
class Permission {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,Closure $next)
    {

        //权限验证
        $manager_id=Session::get('manager_id');
        
      if($manager_id!=1){
                    $data=DB::table('owner_role')
                                  ->join('role','role.role_id','=','owner_role.role_id')
                                  ->join('role_privilege','role.role_id','=','role_privilege.role_id')
                                  ->join('privilege','privilege.pri_id','=','role_privilege.pri_id')
                                  ->where('owner_role.man_id',$manager_id)
                                  ->where('privilege.pri_fid',0)
                                  ->get();
                                 // print_r($data);die;
                     foreach($data as $k=>$v){
                             $arr=DB::table('role_privilege')
                             ->join('privilege','role_privilege.pri_id','=','privilege.pri_id')
                             ->where("pri_fid",$v["pri_id"])
                             ->where('role_id',$v['role_id'])
                             ->get();
                             $data[$k]['son']=$arr;
                     }
           }else{
                          $data = DB::table('privilege')->where('pri_fid',0)->get();
                          foreach($data as $k=>$v){
                          $arr=DB::table('privilege')->where("pri_fid",$v["pri_id"])->get();
                          $data[$k]['son']=$arr;
                          }
           }

        // $data= $this->dg($data,$parent_id=0);

        //$data= $this->selall_level($data,$pri_fid=0,$level=0);
        //if(!empty($data)){
        //$data = json_decode(json_encode($data, true));
        view()->share('main',$data);
          // print_r($data);die;
           return $next($request);
        // }else{
         //   echo "<script>alert('没有权限，请联系管理员');location.href='admin_'</script>";exit;
        // }
    }

    // public function selall_level($data,$pri_fid=0,$level=0){
    //     $data = json_decode(json_encode($data), true);
    //     //定义一个静态数组
    //     $arr = [];
    //     foreach($data as $key=>$v){
    //         if ($v['pri_fid'] == 0) {
    //             $arr[$v['pri_id']] = $v;
    //         } else {
    //             $arr[$v['pri_fid']]['data'][] = $v;
    //         }
    //     }
    //     return json_decode(json_encode($arr, true));
    // }

}
