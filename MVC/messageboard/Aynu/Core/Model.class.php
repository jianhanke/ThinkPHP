<?php
/**
 * 基础模型类，用来封装所有模型的公共属性和方法
 */
class Model{
	protected $db;	//用来保存MySQLDB单例
	/**
	 * 构造方法实现自动得到MySQLDB单例
	 */
	public function __construct(){
		$this->db = MySQLDB::getInstance($GLOBALS['config']['db']);
	}
}