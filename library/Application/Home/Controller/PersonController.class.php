<?php 

namespace Home\Controller;


class PersonController extends CommonController{

	public function modify_info(){

		$model=D('user');

		if(IS_POST){
		$post=I('post.');	
		$result=$model->modify_user_info();
		if($result){
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}

		}else{

		$result=$model->show_user_info();
		$sex=$result['user_sex'];
		if($sex=='男'){
			$this->assign('man','checked');
			$this->assign('women','');
		}else{
			$this->assign('women','checked');
			$this->assign('man','');
		}
		$this->assign('sex',$sex);
		$this->assign('data',$result);
		$this->display();
		}
		
		

	}
	public function change_pwd(){

		$model=D('user');
		
		if(IS_POST){
			$result=$model->judge_post();
			if($result){
			$this->success('密码修改成功');
		}else{
			$this->error('密码修改失败');
			}
		}else{
			$this->display();
		}

		

	}

}