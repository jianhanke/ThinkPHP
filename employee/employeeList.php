<?php 

function loader($className){
	require './'.$className.'.class.php';
}
spl_autoload_register('loader');
$controller=new EmployeeController();
$controller->listAction();