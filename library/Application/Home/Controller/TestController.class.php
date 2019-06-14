<?php 

namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{

	public function test1(){
		$one=0;
		if(empty($one)){
			echo '空的';
		}else{
			echo '不是空的';
		}

	}

}