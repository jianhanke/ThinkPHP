<?php

//声明命名从简
namespace Admin\Controller;
//引入父类 
//use Think\Controller;
//声明并继承父类
class IndexController extends CommonController{

	public function index(){
		//展示模板
		$this->display();
	}
	
	public function home(){
		//展示模板
		$this->display();
	}
	
}