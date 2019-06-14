<?php 

namespace Admin\Controller;
use Think\Controller;

class UserController extends CommonController{

	public function showList(){

		$model=D('User');
		$info=$model->show_info();
		$this->assign('datas',$info['result']);
		$this->assign('count',$info['count']);
		$this->assign('show',$info['show']);

		$this->display();
	}

	public function modify(){

		$model=D('User');
		if(IS_POST){
			$result=$model->modify_user_info();
			if($result){
				$this->success('修改成功',U('Admin/User/showList'));
			}else{
				$this->error('修改失败');
			}

		}else{
			$info=$model->show_user_info();
			$this->assign('datas',$info);
			$sex=$info['user_sex'];
		if($sex=='男'){
			$this->assign('man','checked');
			$this->assign('women','');
		}else{
			$this->assign('women','checked');
			$this->assign('man','');
		}
		$this->display();

		}

	}
	public function add(){
		$model=D('user');
		if(IS_POST){
			$result=$model->add_user_info();
			if($result){
				$this->success('添加成功');
			}
			else{
				$this->error('添加失败',U(''));
			}
		}else{
			$this->display();
		}
		
	}


}