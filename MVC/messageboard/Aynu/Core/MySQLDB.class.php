<?php
class MySQLDB{
	private $link;	//用来保存数据库连接
	private static $instance;	//用来保存单例对象
	private function __construct($config){	//私有构造函数阻止在类的外部实例化
		$host = isset($config['host']) ? $config['host'] : 'localhost';
		$port = isset($config['port']) ? $config['port'] : '3306';
		$user = isset($config['user']) ? $config['user'] : 'root';
		$pwd = isset($config['pwd']) ? $config['pwd'] : 'zhao/980931';
		$charset = isset($config['charset']) ? $config['charset'] : 'utf8';
		$dbname = isset($config['dbname']) ? $config['dbname'] : '';

		$this->link = @mysqli_connect($host,$user,$pwd,$dbname,$port) or die('连接数据库出错'.mysqli_connect_error());
		mysqli_set_charset($this->link,$charset);
	}
	private function __clone(){}	//私有克隆方法阻止在类外部复制对象
	//公有的getInstance方法用于在类外部获取单例对象
	public static function getInstance($config){
		if (self::$instance == null) {
			self::$instance = new self($config);
		}
		return self::$instance;
	}
	/**
	 * query方法用来执行SQL语句
	 * @param string $sql 要执行的SQL语句
	 * 如果是数据的增删改，成功返回true，失败返回false
	 * 如果是数据查询，成功返回结果集，失败返回false
	 */
	public function query($sql){
		if (!$result = mysqli_query($this->link, $sql)) {
			die('执行SQL出错'.mysqli_error($this->link));
		}
		return $result;
	}
	/**
	 * 从表中查出多条记录
	 * @param string $sql 可以查询出多条数据SQL语句
	 * @return array 包含查询出的多条数据的一个二维数组
	 */
	public function fetchRows($sql){
		$result = $this->query($sql);
		$rows = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
	/**
	 * 从表中查出单条记录
	 * @param  string $sql 最多只能查询出一条数据的SQL语句
	 * @return array 包含查询出的一条数据的一维数组
	 */
	public function fetchRow($sql){
		$result = $this->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
}









