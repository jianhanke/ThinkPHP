<?php 

require './MySQLDB.class.php';

class EmployeeModel{
	private $db;

	public function __construct(){

		require './config.php';
		$this->db = MySQLDB::getInstance($config);

	}
	public function getList(){
		$sql="select * from employee  ";
		
		$result=$this->db->fetchRows($sql);
	
		return $result;
	}
	public function delById(){
		$id=$_GET['id'];
		$sql="delete from employee where id = $id ";
		$this->db->query($sql);
	}

	public function showInfo(){
		$id=$_GET['id'];	
		$sql="select * from employee where id = $id ";
		return $this->db->fetchRow($sql);

	}
	public function modifyInfo(){
		// $id2=$_GET['id'];  //经测试 get post 传递id 可以同时使用 
		$id=$_POST['id'];
		$name=$_POST['name'];
		$gender=$_POST['gender'];
		$birthdate=$_POST['birthdate'];
		$department=$_POST['department'];
		$remarks=$_POST['remarks'];

		$sql="update employee set name='$name',gender='$gender',birthdate='$birthdate',department='$department',remarks='$remarks' where id = $id ";
		$this->db->query($sql);


	}
}