<?php
/**
 * EmployeeModel用来实现employee表的各种业务逻辑操作
 */
class EmployeeModel extends Model{
	/**
	 * getList方法获取employee表中的所有员工信息
	 */
	public function getList(){
		$sql = "select * from employee";
		return $this->db->fetchRows($sql);
	}
	/**
	 * delById方法删除指定id对应的员工
	 * @param  int $id 员工记录id字段值
	 */
	public function delById(){
		$id = $_GET['id'];
		$sql = "delete from employee where id = $id";
		$this->db->query($sql);
	}
	public function getById(){
		$id = $_GET['id'];
		$sql = "select * from employee where id = $id";
		$result = $this->db->fetchRow($sql);
		return $result;
	}
	public function update(){
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$birthdate = $_POST['birthdate'];
		$department = $_POST['department'];
		$remarks = $_POST['remarks'];
		$id = $_POST['id'];
		$sql = "update employee set name = '$name', gender = '$gender', birthdate = '$birthdate', department = '$department', remarks = '$remarks' where id = $id";
		$this->db->query($sql);
	}
	public function insert(){
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$birthdate = $_POST['birthdate'];
		$department = $_POST['department'];
		$remarks = $_POST['remarks'];
		$sql = "insert into employee(name, gender, birthdate, department, remarks) values('$name', '$gender', '$birthdate', '$department', '$remarks')";
		$this->db->query($sql);
	}
	public function search(){
		 $name = $_POST['keywords'];
		 $sql = "select * from employee where name = '$name'";
		 $result = $this->db->fetchRows($sql);
		 return $result;
	}
}