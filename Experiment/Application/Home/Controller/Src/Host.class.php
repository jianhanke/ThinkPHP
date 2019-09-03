<?php 


namespace Home\Controller\Src;

class Host{

	public static function getHostName(){
		return $_SERVER['SERVER_NAME'];
	}

}