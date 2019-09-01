<?php 

namespace Home\Model;
use Think\Model;

class Docker_containerModel extends Model{

	public function show_Tests(){

		return $this->select();
		
	}

	public function find_ContainerId_By_ImageId($user_id,$image_id){
		$info=$this->where("student_id='$user_id' and Image_id='$image_id'")->find();
		return $info['container_id'];
	}

	public function find_Ip_id($user_id,$image_id){
		$info=$this->where("student_id='$user_id' and Image_id='$image_id'")->find();
		return $info['ip_num'];	
	}

	public function add_Container($user_id,$container_id,$image_id,$ip,$ip_num){
		$this->Container_id=$container_id;
		$this->student_id=$user_id;
		$this->Image_id=$image_id;
		$this->ip=$ip;
		$this->ip_num=$ip_num;
		return $this->add();
	}

	public function find_Max_Ip(){
		return $this->max('ip_num');
	}

	public function find_Ip_Prefix(){
		return $this->max('ip_prefix');
	}

	public function find_ContainerId_By_Ip($ip_num){

		return $this->where("ip_num='$ip_num'")->find()['container_id'];
		

	}
	



	
}