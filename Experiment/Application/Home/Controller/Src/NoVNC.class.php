<?php 

namespace Home\Controller\Src;

class NoVNC{
	
	public static function JumpUrlByIp($ip_num){
		$hostName =  \Home\Controller\Src\Host::getHostName();
		echo "<script> top.location.href='http://$hostName:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
	}

}