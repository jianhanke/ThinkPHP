<?php
/**
 * Employee控制器类，用来实现员工管理的各种操作。
 */
class EmployeeController{
	public function listAction(){
		$model = new EmployeeModel();
		$result = $model->getList();
		require __VIEW__.'employeeList.html';
	}
	public function delAction(){
		$model = new EmployeeModel();
		$model->delById();
		header('location:./index.php?c=employee&a=list');
	}
	public function modifyAction(){
		$model = new EmployeeModel();
		$result = $model->getById();
		require  __VIEW__.'employeeModify.html';
	}
	public function updateAction(){
		$model = new EmployeeModel();
		$model->update();
		header('location:./index.php?c=employee&a=list');
	}
	public function addAction(){
		require(__VIEW__.'employeeinsert.html');
	}
	public function insertAction(){
		$model = new EmployeeModel();
		$model->insert();
		header('location:./index.php?c=employee&a=list');
	}
	public function searchAction(){
		$model = new EmployeeModel();
		$result = $model->search();
		require( __VIEW__.'employeeSearchResult.html');
	}
}