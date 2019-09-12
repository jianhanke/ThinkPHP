<?php 


namespace Home\Controller\Entity;

class Host{

	public static function getHostName(){
		return $_SERVER['SERVER_NAME'];
	}

}