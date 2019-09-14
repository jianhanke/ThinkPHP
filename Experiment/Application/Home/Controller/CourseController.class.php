<?php 

namespace Home\Controller;


class CourseController extends MyController{


	public  function showCourseById(){


		$id=I('get.id');
		$model=D('Chapter');
		$info=$model->find_Chapter_By_Course_Id($id);
		// dump($info);
		$this->assign('datas',$info);
		$this->display();
	}

	public function joinChapterById(){

		$chapter_id=I('get.id');
		$user_id=session('user_id');
		$model=D('chapter');
		$model3=new \Home\Model\Docker_containerModel();

		$image_id=$model->find_Image_By_id($id);
		// dump($image_id);

		$info=$model3->if_Join_Chapter($image_id,$chapter_id); //判断是否已经加入此章节

		if($info){    //已经加入找到对应容器进入即可，
			$container_id=$model3->find_ContainerId_By_ImageId($image_id,$chapter_id);
			$docker=new \Home\Controller\Entity\Docker();
			$docker->startContainerById($container_id);
			
			$ip_num=$model3->find_Ip_By_Chapter($user_id,$image_id,$chapter_id);
			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}else{       //没有则加入此章节，并创建容器

			$info=$this->runContainerById($image_id);
			$model3->add_Container_To_Chapter($user_id,$info[0],$image_id,$info[1],$info[2],$chapter_id); //学生容器id 加入 docker_container
			$ip_num=$info[2];
			// dump($image_id);
			// dump($info);
			// dump('ipnum'.$ip_num);
			// echo "<script> top.location.href='http://localhost:6080/vnc.html?path=/websockify?token=host$ip_num' </script> ";
			$NoVNC=A('NoVNC');
			$NoVNC->showNoVNC($ip_num);
			exit();
		}

	}

	public function runContainerById($image_id){
		
		$docker=new \Home\Controller\Entity\Docker();
		$ips=$docker->getNewIp();
		// dump($ips);
		$ip=$ips['ip'];
		
		$container_id=$docker->runContainerByIdIp($image_id,$ip);    //具体docker中 run -it 

		$info[]=$container_id;
		$info[]=$ip;
		$info[]=$ips['ip_num'];
		return $info;
	}


}