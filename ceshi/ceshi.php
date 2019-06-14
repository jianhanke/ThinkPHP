<?php 




class Alien{

	public function alien2(){
		echo '<br />';
		echo $GLOBALS['name'];
	}
}

$a=new Alien();
$a->alien2();

