<?php 

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){
		$this->display();
	}
	public function logout(){

		session(null);
		$this->success('退出成功',U('Admin/index/login'));
	}

	public function captcha(){
		$cfg =array(
			'fontSize' => 12,
			'useCurve' => false,
			'useNoise' =>	false,
			'length'   => 4,
			'fontttf'  =>'4.ttf',
		);
		$verify=new \Think\Verify($cfg);
		$verify->entry();
	}
	public function verifyLogin(){

		$post=I('post.');
		$verify=new \Think\Verify();
		$result=$verify->check($post['captcha']);

		if($result){
			$model=M('admin');
			unset($post['captcha']); //删除验证码信息，因为数据库没有验证码字段

			$data = $model -> where($post) -> find();
			if($data){
				session('id',$data['id']);
				session('admin_name',$data['admin_name']);
				//将信息放到session 
				$this->success('登录成功',U('Admin/Index/index'));
			}else{
				$this->error('用户名或密码错误',U('Admin/Index/login'));
			}

		}else{
			$this->error('验证码错误');
		}

	}


}
