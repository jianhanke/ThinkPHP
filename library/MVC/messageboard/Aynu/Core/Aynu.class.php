<?php
class Aynu{
	/**
	 * 完成项目初始准备
	 */
	private static function init(){
		session_start();
		//定义路径常量
		define('APP_PATH', './Application/');
		define('CONFIG_PATH', APP_PATH.'Config/');
		define('CONTROLLER_PATH', APP_PATH.'Controller/');
		define('VIEW_PATH', APP_PATH.'View/');
		define('MODEL_PATH', APP_PATH.'Model/');
		define('AYNU_PATH', './Aynu/');
		define('CORE_PATH', AYNU_PATH.'Core/');
		define('PUBLIC_PATH','./Public/');
		//加载配置文件
		require CONFIG_PATH.'config.php';
		$GLOBALS['config']= $config;
		//加载核心文件
		require CORE_PATH.'MYSQLDB.class.php';
		require CORE_PATH.'Model.class.php';
	}
	/**
	 * 请求分发
	 */
	private static function dispatch(){
		$p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['config']['app']['default_platform'];	//获取p参数
		$c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['app']['default_controller'];	//获取c参数
		$a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['app']['default_action'];	//获取a参数
		
		$platform_name = $p; //平台名称
		$controller_name = $c.'Controller'; //拼接得到控制器名称
		$action_name = $a.'Action'; //拼接得到方法名称

		define('__CONTROLLER__', CONTROLLER_PATH.$platform_name.'/');	//请求的控制器所在平台下的目录
		define('__VIEW__', VIEW_PATH.$platform_name.'/');		//对应的视图所在的平台下的目录
		define('__PUBLIC__',PUBLIC_PATH);
		
		$controller = new $controller_name(); //得到控制器实例
		$controller->$action_name(); //调用控制器方法
	}
	/**
	 * 根据类性质不同加载不同位置的类文件
	 */
	private static function Load($class_name){
		if (substr($class_name, -5) == 'Model') {
			require MODEL_PATH.$class_name.'.class.php';
		} elseif (substr($class_name, -10) == 'Controller') {
			require __CONTROLLER__.$class_name.'.class.php';
		}
	}
	/**
	 * 注册Load
	 */
	private static function autoload(){
		spl_autoload_register('self::Load');
	}
	public static function run(){
		self::init();
		self::autoload();
		self::dispatch();
	}
}




