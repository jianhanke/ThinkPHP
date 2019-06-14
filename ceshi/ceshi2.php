<?php 

class Person{

	public function setName(){
		$GLOBALS['name']='测试名字';
		
	}
}
class Student{

	public function getName(){
		echo $GLOBALS['name'];
	}
}


$p=new Person();
$p->setName();

echo $GLOBALS['name'];

$s=new Student();
$s->getName();

require ('./ceshi.php');

$a=new Alien();
$a->alien2();