<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class PrivilegeModel extends Model
{
    //查询表中所有数据
	public function lst(){
		$arr = DB::table('privilege')->get();
		//print_r($arr);die;
		return $this->list_level($arr,$pri_fid=0,$level=0);
	}
	/**
	 *递归实现两级分类
	 */
	public function list_level($arr,$pri_fid=0,$level=0){
		//定义一个静态数组（防止多次实例化）
		static $data = array();
		foreach($arr as $key=>$val){
			if($val['pri_fid']==$pri_fid){
				$val['level'] = $level;
				$data[] = $val;
				$data = $this->list_level($arr,$val['pri_id'],$level+1);
			}
		}
		return $data;
	}
}
