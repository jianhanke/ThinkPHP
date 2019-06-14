<?php 
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{

	// public function __construct(){
	// 	//构造父类
	// 	parent::__construct();
	// 	echo 'hello,World';
	// }
	// 
	// ThinkPHP 封装构造方法
	public function _initialize(){
		//echo 'Hellow , World!';
		//
		if(empty(session('id'))){
			//$this->error('请先登录',U('Public/login'),3);exit;
			//
			$url=U('Public/login');
			echo "<script> top.location.href='$url' </script> ";
		}
		$role_id=session('role_id');
		$rbac_role_auths=C('RBAC_ROLE_AUTHS');
		$currRoleAuth=$rbac_role_auths[$role_id];

		$controller =strtolower( CONTROLLER_NAME);
		$action=strtolower(ACTION_NAME);

		if($role_id > 1){
			if(!in_array($controller . '/' .$action,$currRoleAuth) 
				&& !in_array($controller . '/*',$currRoleAuth)){
				$this->error('你没有权限',U('Index/home'),3);exit;
			}

		}
	}

}