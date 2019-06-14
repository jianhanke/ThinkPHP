<?php 

class MessageModel extends Model{

	public function show_info(){
		$sql="select * from message";
		return $this->db->fetchRows($sql);
	}
	public function add_message(){
		$poster=$_POST['poster'];
		$mail=$_POST['mail'];
		$message=$_POST['message'];
		$date=date('Y-m-d h:i:s', time());
		$sql="insert into message (date,poster,message,mail) values ('$date','$poster','$message','$mail')";
		echo $sql;
		return $this->db->query($sql);
	}

	public function modify_message(){
		$id=$_GET['id'];
		$sql="select * from message where id='$id'";
		return $this->db->fetchRow($sql);
	}

	public function save_message(){
		$id=$_POST['id'];
		$poster=$_POST['poster'];
		$mail=$_POST['mail'];
		$message=$_POST['message'];
		$reply=$_POST['reply'];
	$sql="update message set poster='$poster',mail='$mail',message='$message',reply='$reply' where id='$id' ";
		return $this->db->query($sql);

	}

}