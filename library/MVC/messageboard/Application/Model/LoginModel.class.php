<?php 

class LoginModel extends model{

	public function check_login(){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql="select username from admin ";
		$all_info=$this->db->query($sql);
		$all_user=[];
		foreach($all_info as $k => $v){
			$all_user[]=$v['username'];
		}
		if(in_array($username,$all_user)){
			$sql="select password from admin where username='$username'";
			$info=$this->db->fetchRow($sql);
			if($password==$info['password']){
				$_SESSION['username']=$username;
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}

		
	}
}