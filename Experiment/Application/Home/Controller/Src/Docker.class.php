<?php 

namespace Home\Controller\Src;


class Docker{

	
	private $fileSuffix='.py';
	private $exeAddress="/usr/bin/python";
	
	private  function getConDockerAddressByCmd($cmd){
		$dockerPath=dirname(__FILE__).'/ControllerDocker/';	
		return $dockerPath+$cmd+$fileSuffix;
	}

	public  function startContainerById($container_id){

		$dockerPath=$this->getConDockerAddressByCmd("startContainerById");
		
		exec("/usr/bin/python $docker_path $container_id");  
		exec($this->$exeAddress $dockerPath $container_id);
		dump($this->dockerPath);
		dump($this->exeAddress);
	}

	public function restartContainerByIp($container_id){
		
		$dockerPath=$this->getConDockerAddressByCmd("restartContainerByIp");
		// exec($this->$exeAddress $dockerPath $container_id);  
	}

}