<?php
class Aynu{
	private static function init(){
		define('APP_PATH', './Application/');
		define('CONFIG_PATH', APP_PATH.'Config/');
		define('CONTROLLER_PATH', APP_PATH.'Controller/');
		define('VIEW_PATH', APP_PATH.'View/');
		define('MODEL_PATH', APP_PATH.'Model/');
		define('AYNU_PATH', './Aynu/');
		define('CORE_PATH', AYNU_PATH.'Core/');
		require CONFIG_PATH.'config.php';
		$GLOBALS['config'] = $config;
		require CORE_PATH.'MySQLDB.class.php';
		require CORE_PATH.'Model.class.php';
	}
	private static function dispatch(){
		$p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['config']['app']['default_platform'];
		$c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['app']['default_controller'];
		$a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['app']['default_action'];

		$controller_name = $c.'Controller';
		$action_name = $a.'Action';

		define('__CONTROLLER__', CONTROLLER_PATH.$p.'/');
		define('__VIEW__', VIEW_PATH.$p.'/');
		define('__PUBLIC__','./Public/');

		$controller = new $controller_name();
		$controller->$action_name();
	}
	private static function Load($class_name){

		if (substr($class_name, -5) == 'Model') {
			require MODEL_PATH.$class_name.'.class.php';
		} elseif (substr($class_name, -10) == 'Controller') {
			require __CONTROLLER__.$class_name.'.class.php';
		}
		
	}
	private static function autoload(){
		spl_autoload_register('self::load');
	}
	public static function run(){
		self::init();
		self::autoload();
		self::dispatch();
	}
}