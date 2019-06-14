<?php 
namespace Home\Controller;
//use Think\Controller;
class UserController extends CommonController {
   public function test(){
   		echo U('Index/index');
   		$this->success("跳转提醒","",30);
   		$this->error("提醒,错误");
   }
}