<?php 


class Person{
                
        /*
                
            $this-> 指当前对象，类内类外，都是使用 $this->name
            self:: 指类内全局变量，如: self::$age ;类外使用如 Person::$age
        */
 
	public  $name;           
	public static $age;
 
	public function setName($name){
		$this->name=$name;
	}
	public function setAge($age){
		self::$age=$age;
	}
 
}
$p=new Person();
 
$p->setName('剑寒客');
echo $p->name;
 
$p->setAge('20');
echo Person::$age;

