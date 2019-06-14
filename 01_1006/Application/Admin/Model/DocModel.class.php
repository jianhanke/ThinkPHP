<?php 

namespace Admin\Model;
use Think\Model;

class DocModel extends Model{

	//方法
	// public function saveData2(){
	// 		$post=I('post');
	// 		if(!$file['error']){
	// 			$cfg=array(
	// 				'rootPath'=> WORKING_PATH.UPLOAD_ROOT_PATH);
	// 			$upload=new \Think\Upload($cfg);
	// 			$info=$upload->uploadOne($file);
	// 		if($info){
	// 	$post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
	// 	$post['filename']=$info['name'];
	// 	$post['hasfile']=1;
	// 		}
	// 		}

	// 		$post['addtime']=time();
	// 		$result=$this->add($post);
	// }
	public function saveData($post,$file){
		//处理提交
		//dump($file);die;
		//先判断是否有文件需要处理
		if(!$file['error']){
			//定义配置
			$cfg = array(
					//配置上传路径
					'rootPath'	=>	WORKING_PATH . UPLOAD_ROOT_PATH
				);
			//处理上传
			$upload = new \Think\Upload($cfg);
			//开始上传
			$info = $upload -> uploadOne($file);
			
			//dump($info);die;
			//判断是否上传成功
			if($info){
				//补全剩余的三个字段
				$post['filepath'] = UPLOAD_ROOT_PATH . $info['savepath'] . $info['savename'];
				$post['filename'] = $info['name'];//文件的原始名
				
				$post['hasfile'] = 1;
			}else{
				//A方法实例化控制器
				A('Doc') -> error($upload -> getError());exit;
			}
		}
		//补全addtime字段
		$post['addtime'] = time();
		//添加操作
		return $this -> add($post);
	}
	public function updateData($post,$file){
		if($file['error']=='0'){
			$cfg=array('rootPath'=>WORKING_PATH.UPLOAD_ROOT_PATH);
			$upload= new \Think\Upload($cfg);
			$info=$upload->uploadOne($file);

			if($info){
			$post['filepath']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
			$post['filename']=$info['name'];
			$post['hasfile']=1;
			}
		}
			return $this->save($post);
		}
	

}