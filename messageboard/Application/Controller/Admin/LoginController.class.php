<?php 

class LoginController  {

	public function showAction(){
		
		require __VIEW__.'admin_login.html';
	}

	public function loginAction(){

			$model=new LoginModel();
			$result=$model->check_login();
			if($result){
				header('location:./index.php?p=Admin&c=Message&a=show');
			}else{
			$GLOBALS['error']='你还没有登录';
			$this->showAction();
	// exit('<script language="JavaScript">top.location.href="./index.php?p=Admin&c=Login&a=show "</script>'); 
			}	
	}

}