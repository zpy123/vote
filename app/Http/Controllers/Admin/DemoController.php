<?php
namespace App\Http\Controllers\Admin;
use app\permission;
use App\Http\Controllers\Controller;

class DemoController extends Controller{

        public function index(){
                $model = new \App\permission();
                $arr = $model->lists();
                echo $arr;
        }
}
?>
