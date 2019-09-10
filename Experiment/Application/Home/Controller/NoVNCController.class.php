<?php 

namespace Home\Controller;

class NoVNCController extends MyController{


	public function showNoVNC(){
		// dump($ip_num);
		$url='ws://localhost:6080/websockify?token=host'.$ip_num;
		$this->assign('url',$url);
		$this->display('NoVNC/showNoVNC');
	}

}