<?php 



class EmployeeController {
	
	public function listAction(){

		$model=new EmployeeModel();
		$result=$model->getList();
		require './employeeList.html';
		
	}

	public function delAction(){

		$model=new EmployeeModel();
		$model->delById();
		header('Location:./index.php');

	}
	public function showAction(){
		$model=new EmployeeModel();
		$data=$model->showInfo();
		require './EmployeeModify.html';
	}
	public function modifyAction(){
		$model=new EmployeeModel();
		$model->modifyInfo();
		$this->listAction();
	}

}