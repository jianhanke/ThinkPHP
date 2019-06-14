<?php 

namespace Home\Controller;

use Think\Session;

class BookController extends CommonController{


	public function borrow_book(){
		$model=D('books');



		if(isset($_GET['id'])){

			$result=$model->borrow_now_book();
			if(!$result){
				$this->error('借书失败');
			}
		}
		if(IS_POST){
			$result=$model->search_keyword();
			$this->assign('datas',$result);
			$this->display();
			exit();	

		}

		$info=$model->check_books_status();
		$this->assign('show',$info['show']);
		$this->assign('count',$info['count']);
		$this->assign('datas',$info['result']);
		$this->display();
	}
	public function return_book(){
		$book_model=D('books');

		if(isset($_GET['id'])){  //点击还书后执行代码
			
			$result=$book_model->return_book();
			if($result){  //判断执行成功与否
				$this->success('还书成功');
			}else{
				$this->error('还书失败');
			}

		}else{
		
		$info=$book_model->show_borrow_book();	
		$this->assign('show',$info['show']);
		$this->assign('count',$info['count']);
		$this->assign('datas',$info['data']);
		$this->display();
	}

	}


}