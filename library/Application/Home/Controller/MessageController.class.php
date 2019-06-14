<?php 

namespace Home\Controller;

class MessageController extends CommonController{

	public function leave_message(){
		
		if(IS_POST){
			$model=D('Message');
			$result=$model->save_message();
			if($result){
				$this->success('留言成功');
			}else{
				$this->error('留言失败');
			}
		}else{
			$this->display();
		}
		
	}

	public function show_message(){

		$model=D('Message');
		$all_info=$model->all_message();
		$top_info=$model->top_message();

		$this->assign('tops',$top_info);
		$this->assign('datas',$all_info);
		$this->display();
	}


}