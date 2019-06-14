<?php 

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller{
	public function login(){
		//展示模板文件
		$this->display();
		//$str=$this->fetch();   //display 比fetch 多了一步输出
	//		echo '<pre>';
		// dump($str);
		//echo ($str);
	}
	public function index(){
		$this->display();
	}
	public function home(){
		$this->display();
	}
	public function captcha(){
		$cfg=array(
			'fontSize'  => 12,
			'useCurve'  =>  false,            // 是否画混淆曲线
        	'useNoise'  =>  false,
        	'length'    =>  4,
        	'fontttf'   =>'4.ttf',
			);
		$verify=new \Think\Verify($cfg);
		$verify->entry();
	}

	public function checkLogin(){
		$post=I('post.');
		//验证码 不要传参
		$verify=new \Think\Verify();
		$result=$verify->check($post['captcha']);
		if($result){

			unset($post['captcha']);
			$model=M('user');
			dump($model);die;
			$data=$model->where( $post)->find();
			if($data){
				//存在用户，用户信息持久化，保存到session中，跳转到后天
				session('id',$data['id']);
				session('username',$data['username']);
				session('role_id',$data['role_id']);
				$this->success('登陆成功',U('Index/index'),3);
				$this->assign('username',$data['username']);
			}else{
				$this->error('用户名或密码错误');
			}

		}else{	
			$this->error('输入验证码有误');
		}
	}
	public function logout(){
			session(null);
			$this->success('退出成功',U('login'),3);
	}

}

 