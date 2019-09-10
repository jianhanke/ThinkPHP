<?php 

namespace Home\Controller;
use Think\Controller;

class DockerController extends MyController{

	/*
		如果学生已经加入课程，直接启动所在容器	
		学生还没有加入即第一次加入，run一个容器
	 */
	public function joinExperiment(){
		$model=D('Experiment');
		$model2=new \Home\Model\Student_experimentModel();
		// $model3=new \Home\Model\Docker_containerModel();
		$model3=new \Home\Model\Docker_containerModel();

		$experimentId=I('get.id');
		$user_id=session('user_id');
	    
		$is_exist=$model2->if_Join_Experiment($user_id,$experimentId);  //判断是否已经加入课程
		// dump($user_id);
	 //    dump($experimentId);
		// dump($is_exist);
		if($is_exist){     //找到实验id,查出实验索要的镜像id,根据user_id和iamge_id 查出容器id,并开启
							
			$image_id=$model->find_ImageId_By_experimentId($experimentId);

			$container_id=$model3->find_ContainerId_By_ImageId($user_id,$image_id);
			$this->startContainerById($container_id);
			$ip_num=$model3->find_Ip_id($user_id,$image_id);
			// dump('ipnum:'.$ip_num);
			// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
			
			// $noVNC=new \Home\Controller\Src\NoVNC();
			// $noVNC->JumpUrlByIp($ip_num);
			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}else{             //   找到实验的id,查出实验索要用的镜像id, 加入课程,  然后跟开启一个新的容器，并返回容器id
			$image_id=$model->find_ImageId_By_experimentId($experimentId);
			$model2->student_Join_Experiment($user_id,$experimentId);    //学生加入课程，填写到experiment 
			$info=$this->runContainerById($image_id);
			// 
			$model3->add_Container($user_id,$info[0],$image_id,$info[1],$info[2]); //学生容器id 加入 docker_container

			$ip_num=$model3->find_Ip_id($user_id,$image_id);
			// dump($image_id);
			// dump($info);
			// dump('ipnum'.$ip_num);
			// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}
	}
	/*
		docker start ....  启动一个已经停止的容器
	 */
	public function startContainerById($container_id){

		$docker_path=dirname(__FILE__).'/ControllerDocker/startContainerById.py';
		exec("/usr/bin/python $docker_path $container_id");   //启动
	}
	public function restartContainerByIp(){
		$model=new \Home\Model\Docker_containerModel();

		$false_ip=I('get.false_ip');
		$ip_num=str_replace('host','',$false_ip);
		dump($false_ip);
		dump($ip_num);
		

		$container_id=$model->find_ContainerId_By_Ip($ip_num);

		
		$docker_path=dirname(__FILE__).'/ControllerDocker/restartContainerById.py'; //重启
		exec("/usr/bin/python $docker_path $container_id");   
		// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
		$noVNC=new \Home\Controller\Src\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);
		exit();
	}

	public function startContainerByIp(){
		$model=new \Home\Model\Docker_containerModel();

		$false_ip=I('get.false_ip');
		$ip_num=str_replace('host','',$false_ip);

		$container_id=$model->find_ContainerId_By_Ip($ip_num);
		$docker_path=dirname(x).'/ControllerDocker/startContainerById.py'; //重启
		exec("/usr/bin/python $docker_path $container_id");   
		// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
		$noVNC=new \Home\Controller\Src\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);
		exit();
	}

	public function stopContainerByIp(){
		$model=new \Home\Model\Docker_containerModel();

		$false_ip=I('get.false_ip');
		$ip_num=str_replace('host','',$false_ip);
		$container_id=$model->find_ContainerId_By_Ip($ip_num);
		$docker_path=dirname(__FILE__).'/ControllerDocker/stopContainerById.py'; //关机
		exec("/usr/bin/python $docker_path $container_id");   
		// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
		$noVNC=new \Home\Controller\Src\NoVNC();
		$noVNC->JumpUrlByIp($ip_num);
		exit();

	}


	/*
		docker run -d 运行一个新容器，返回容器id,存入数据库
	 */
	public function runContainerById($image_id){
		
		$ips=$this->getNewIp();
		$ip=$ips['ip'];
		dump($ips);
		$docker_path=dirname(__FILE__).'/ControllerDocker/runContainerById.py';
		$container_id=exec("/usr/bin/python $docker_path $image_id $ip");

		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}

	public function getNewIp(){

		$model=new \Home\Model\Docker_containerModel();

		$ip_num=$model->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip_prefix=(int)($ip_num/256);
		$ip_num=$ip_num%256;
		$ip='172.19.'.$ip_prefix.'.'.$ip_num;
		return array('ip'=>$ip,'ip_num'=>$ip_num);
	}
	
	public function ceshi(){
		
		$model=new \Home\Model\Docker_containerModel();

		$ip_num=$model->find_Max_Ip();
		$ip_num=(int)$ip_num+1;
		$ip='172.19.0.'.$ip_num;
		$image_id='d0ae770d2ba7';
		$docker_path=dirname(__FILE__).'/ControllerDocker/runContainerById.py';
		$$container_id=exec("/usr/bin/python $docker_path $image_id $ip");
		

		$noVNC=new \Home\Controller\Src\NoVNC();
		$noVNC->JumpUrlByIp('3');
		// echo $container_id.'<br />';
		// echo($ip);
		// $info[]=$container_id;
		// $info[]=$ip;
		// return $info;
	}

}