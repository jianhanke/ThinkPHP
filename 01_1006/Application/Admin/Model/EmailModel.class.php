<?php 

namespace Admin\Model;
//use Think\Model;

class EmailModel extends CommonModel{

	public function addData($post,$file){
		$cfg=array('rootPath'=>WORKING_PATH.UPLOAD_ROOT_PATH);
		$upload=new \Think\Upload($cfg);
		$info=$upload->uploadOne($file);
		
		//dump($info);die;
		if($info){
			$post['file']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
			$post['hasfile']='1';
			$post['filename']=$info['name'];

		}
		$post['from_id']=session('id');
		$post['addtime']=time();
		return $this->add($post);
	}


}