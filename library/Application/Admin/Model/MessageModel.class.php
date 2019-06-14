<?php 

namespace Admin\Model;
use Think\Model;

class MessageModel extends Model{

	public function all_message(){
		return  $this->field("t1.*,t2.user_name ")
						->join("message as t1 ,user as t2 ")
						->where("t1.user_id=t2.user_id AND (t1.user_status =1 OR t1.user_status=0)")
						->distinct(true)
						->order("add_date desc ")
					 	-> select();

	}
	public function top_message(){
		return  $this->field("t1.*,t2.user_name ")
						->join("message as t1 ,user as t2 ")
						->where("t1.user_id=t2.user_id AND t1.user_status>=10 ")
						->distinct(true)
						->order("add_date desc ")
					 	-> find();

	}

	public function delete_message(){
		$message_id=I('get.message_id');
		return $this->where("message_id =$message_id ")->delete();
	}

	public function set_top_message(){ 
		//将之前的stusts的10 改会原来的 
		 // $info= $this->where("user_status=10")->user_status=1;
		 	$info=$this-> where("user_status>=10")->find();
		 	
		 	$post['user_status']=$info['user_status']-10 ;   //减去10改为原来的
		 	
		 	$id=$info['message_id'];
			$this->where(" message_id=$id")->save($post);
		 	
		//将当前留言，status改成10
		$message_id=I('get.message_id');
		
		$current_info=$this->where("message_id =$message_id ")->find();
	
			 $this-> user_status=$current_info['user_status']+10 ;
		          $this-> message_id=$message_id;
		           $this->save();
		

		  // return $this->user_status=10
		  // 		->where("message_id=$message_id")
		  // 		->save();
	}	


}