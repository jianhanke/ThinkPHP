<?php 

 function loader($className){

	require './'.$className.'.class.php';
}
spl_autoload_register('loader');


$c = isset($_GET['c'])? $_GET['c'] : 'Employee'  ;
$a = isset($_GET['a'])? $_GET['a'] :  'list' ;

$controller_name =$c.'Controller';
 $action_name = $a.'Action';
 
 // $controller=new $c.'Controller'();
 //  不能这么写，因为有自动加载器在， 找不到$c 直接就注册了 $c.class.php 不带上Controller
  
$controller  =new $controller_name();
$controller->$action_name();
