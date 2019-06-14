<?php 

namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller{

	public function _initialize(){

		if(empty(session(user_id))){
			$url=U('Home/Login/login');
			echo "<script> top.location.href='$url' </script> ";
			exit();
		}
		
	}


}