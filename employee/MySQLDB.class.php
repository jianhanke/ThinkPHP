<?php 
class MySQLDB{

	private static $instance;
	private $link;

	private function __construct($config){
		$host=isset($config['host']) ? $config['host'] : 'localhost';
		$user=isset($config['user']) ? $config['user'] : 'root';		
		$pwd=isset($config['pwd']) ? $config['pwd'] : '123456';
		$dbname=isset($config['dbname']) ? $config['dbname'] : '';
		$port=isset($config['port']) ? $config['port'] : '3306';
		$charset=isset($config['charset']) ? $config['charset'] : 'utf8';
		$this->link=mysqli_connect($host,$user,$pwd,$dbname,$port) or die(mysqli_connect_error());
		mysqli_set_charset($this->link,$charset);
	}
	private function __clone(){
		//克隆方法，克隆的变量与之前变量无关，是开辟新的地址块
	}


	public  static  function getInstance($config){ 
		if (self::$instance == null){
			self::$instance=new self($config);
		}
		return self::$instance; #self指当前类
	}

	// public function query($sql){
	// 	$result=mysqli_query($this->link,$sql); #$this-> 指当前对象
	// 	return $result;  # 返回 bool 
	// }
	public function query($sql){
		
		if (!$result=mysqli_query($this->link,$sql)){
			die(mysqli_error($this->link));
			//die输出错误信息，并退出脚本
		}
		return $result;
	}

	public function fetchRows($sql){
		$result=$this->query($sql);
		$rows=array();
		while ($row=mysqli_fetch_assoc($result)){  //mysqli_fetch_assoc 取出一行关联数组 
			$rows[]=$row;
		}
		return $rows;
	}
	public function fetchRow($sql){
		$result=$this->query($sql);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}

}
	require './config.php';  #引入文件，此文件中有一个$config变量，直接用
	$db=MySQLDB::getInstance($config);
	#$sql="insert into employee (name,gender) values('王五','男') ";
	$sql="select * from employee where gender = '男'";
	#$results=$db->query($sql);
	$result=$db->fetchRows($sql);
	


	$sql="select * from employee where id= 6";
	$result2=$db->fetchRow($sql);
	
#echo $results;   #MySQL 读取的数据，不能直接输出，可以用mysqli_fetch_assoc读取

// $db2=MySQLDB::getInstance();
// var_dump($db1);
// var_dump($db2);

#var_dump(MySQLDB::$instance); #测试 ::
// $db2= clone $db1;
// var_dump($db1,$db2);