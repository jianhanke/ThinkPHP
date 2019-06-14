<?php 

namespace Admin\Controller;


class MessageController extends CommonController{

	public function message_manage(){
		$model=D('Message');
		$all_info=$model->all_message();
		$top_info=$model->top_message();
		

		$this->assign('tops',$top_info);
		$this->assign('datas',$all_info);

		$this->display();
	}

	public function deleteById(){

		$model=D('message');
		$result=$model->delete_message();
		if($result){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}

	}
	public function topById(){

		$model=D('message');
		$model->set_top_message();

		$this->redirect('message_manage');

	}

	

}