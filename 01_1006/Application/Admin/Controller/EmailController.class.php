<?php 

namespace Admin\Controller;
use Think\Controller;

class EmailController extends Controller{

	public function send(){

		if(IS_POST){
			$post=I('post.');
			$model=D('Email');
			$result=$model->addData($post,$_FILES['file']);
			if($result){
				$this->success('邮件发送成功');
			}else{
				$this->error('邮件发送失败!');
			}
		}else{
		$data=M('user')->field('id,truename')->where("id!=".session('id')) -> select();
		$this->assign('data',$data);
		$this->display();
		}
	}
	public function sendBox(){
		$data=M('Email')->field('t1.*,t2.truename')->alias('t1')->
		join('left join sp_user as t2 on t1.to_id=t2.id')->where('t1.from_id='.session('id'))
		->select();
		$this->assign('data',$data);
		$this->display();
	}
	public function download(){

		$id=I('get.id');
		$data=M('Email')->find($id);
		$file=WORKING_PATH.$data['file'];
		
		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		//输出缓冲区
		readfile($file);

	}

	public function _empty(){
		$this->display('Empty/error');
	}
	public function recBox(){

		$data=M('Email')->field('t1.*,t2.truename as truename')->alias('t1')->
		join('left join sp_user as t2 on t1.from_id=t2.id')->where('t1.to_id='.session('id'))
		->select();
		$this->assign('data',$data);
		$this->display();
	}
	public function getContent(){

		$id=I('get.id');
		$data=M('Email')->where("id = $id and to_id=".session('id'))->find();
		if($data['isread'] == '0'){
			M('Email')->save(array('id'=>$id,'isread'=>1));
		}
		echo $data['content'];
	}

	public function getCount(){
		if(IS_AJAX){
	      $model=M('Email');
	      $count=$model->where('isread = 0 and to_id ='.session('id'))->count();
	      
	      echo $count;
	    }
}

}