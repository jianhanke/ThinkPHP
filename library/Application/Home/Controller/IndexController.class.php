<?php
namespace Home\Controller;


class IndexController extends CommonController {


    public function home(){
    	
    	$this->redirect('Message/show_message');

    }
    public function index(){
    	$this->display();
    }


}