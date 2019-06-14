<?php 
namespace Admin\Model;
use Think\Model;

class KnowledgeModel extends Model{

	public function addData($post,$file){
		if($file['error']=='0'){
			$cfg=array('rootPath'=>WORKING_PATH.UPLOAD_ROOT_PATH);
			$upload=new \Think\Upload($cfg);
			$info=$upload->uploadOne($file);
			//	dump($info);die;
			if($info){
				$post['picture']=UPLOAD_ROOT_PATH.$info['savepath'].$info['savename'];
				$image=new \Think\Image();
				$image->open(WORKING_PATH.$post['picture']);
				$image->thumb(100,100);
				$image->save(WORKING_PATH.UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename']);
				//不全字段
				$post['thumb']=UPLOAD_ROOT_PATH.$info['savepath'].'thumb_'.$info['savename'];
				
			}
		}
		$post['addtime']=time();
		return $this->add($post);
	}


}