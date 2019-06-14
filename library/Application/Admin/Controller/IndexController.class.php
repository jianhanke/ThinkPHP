<?php 

namespace Admin\Controller;

class IndexController extends  CommonController{

	public function index(){
		// $this->check_session();

		$this->display();
	}
	public function home(){
		// $this->check_session();
		$this->display();
	}
	// public function check_session(){

	// 	if(empty(session(id))){
	// 		$this->error('你还没有登录',U('Index/login'));
	// 	}
	// }


	

	public function ceshi(){
		$one='This is  one';
		$two =" This is two";
	
		
		echo 'This is \'$one\' ';
		echo "This is '$two' ";

	}
	public function logout(){
		session(null);
		$this->success('退出成功',U('Admin/login/login'));

	}



}