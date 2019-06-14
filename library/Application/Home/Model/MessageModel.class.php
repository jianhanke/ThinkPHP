<?php 

namespace Home\Model;
use Think\Model;

class MessageModel extends Model{

	public function save_message(){
		$post=I('post.');
		$user_id=Session("user_id");
		$post['user_id']=$user_id;
		$time=date("Y-m-d H:i:s");
		$post['add_date']=$time;
		return $this->add($post);

	}

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


}