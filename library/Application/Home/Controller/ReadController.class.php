<?php 

namespace Home\Controller;

class ReadController extends CommonController{

	public function story(){
		$model=D('Story');
		$result=$model->show_story();
		$this->assign('data',$result);
		$this->display();
	}
	public function get_book(){
		$model=D('Story');

		$path=$model->get_path();
		$content=file_get_contents($path);
		$file=fopen($path,"r");
		if($file==false){
			echo ("Error in opening file");
			exit();
		}
		$filesize=filesize($path);
		$filetext=fread($file,$filesize);
		fclose($file);
		$this->assign("filetext",$filetext);
		$this->display();

	}

}