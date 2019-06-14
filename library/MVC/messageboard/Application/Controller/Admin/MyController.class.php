<?php 

class MyController{

	public function __construct() {
		
		$username=$_SESSION['username'];
		if($username){
			
		}else{
			header('location:./index.php?p=Admin&c=Login&a=show');
		}


	}


}