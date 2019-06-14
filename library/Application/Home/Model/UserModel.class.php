<?php 

namespace Home\Model;
use Think\Model;

class UserModel extends Model{

	public function judge_post(){

			$id=Session('user_id');
			$post=I('post.');
			$new_pwd=$post['new_pwd'];
			$new_pwd2=$post['new_pwd2'];

			if($new_pwd==$new_pwd2){
				$pwd['user_pwd']=$new_pwd;
				return  $this->where("user_id=$id") ->save($pwd);
			}
	}
	public function modify_user_info(){

		$post=I('post.');	
		return $this->save($post);
		
	}

	public function show_user_info(){
		$user_id=Session('user_id');
		return $this->field("user_id,user_name,user_tele,user_sex") ->find($user_id);
	}
	public function register_user(){
		$post=I('post.');
		$user_id=I('post.user_id');
		unset($post['user_pwd2']);
	    $result=$this->find($post['user_id']);
	    if(!$result){
	    	$judge=$this->add($post);
	    	return $judge;
	    }else{
	    	return 0;
	    }
	    
	    

	}


}