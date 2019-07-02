<?php 

class IndexController{

	public function showAction(){
		$model=new MessageModel();

		$infos=$model->show_info();
		$count=count($infos);
		require __VIEW__.'index.html';
	}

	public function addAction(){
		$model=new MessageModel();
		$info=$model->add_message();
		header('location:./index.php?c=index&a=show');
	}

}