<?php 

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
	

	public function _initialize(){

		if(empty(session(id))){
			$url=U('Admin/Login/login');
			echo "<script> top.location.href='$url' </script> ";
			exit();
		// 	echo 'This is \'$one\' ';
		// echo "This is '$two' ";
		// 双引号会解析 ,双引号里面的如果需要将继续解析需要加单引号，双引号会出错
		// 单引号不会解析 ，单引号不许加单或双引号，如果需要加，则应该加上反斜杠 \
			
		}


	}

}