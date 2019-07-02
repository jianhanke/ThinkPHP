<?php 

class MessageController extends MyController{


	public function showAction(){
		$model=new MessageModel();
		$infos=$model->show_info();
		$username=$_SESSION['username'];
		require(__VIEW__.'message_list.html');
	}

	public function addAction(){
		$model=new MessageModel();

	}

	public function modifyAction(){
		$model=new MessageModel();
		$info=$model->modify_message();
		require(__VIEW__.'message_reply.html');
	}
	public function saveAction(){
		$model=new MessageModel();
		$model->save_message();
		header('location:./index.php?p=Admin&c=Message&a=show');
	}

	public function clearAction(){
		unset($_SESSION['username']);
		new MyController();
	}



}