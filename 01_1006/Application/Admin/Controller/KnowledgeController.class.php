<?php 
namespace Admin\Controller;
//use Think\Controller;

class KnowledgeController extends CommonController{

	public function add(){
		if(IS_POST){
			$post=I('post.');
			$model=D('knowledge');
			$result=$model->addData($post,$_FILES['thumb']);
			if($result){
				$this->success("添加成功");
			}else{
				$this->errot("添加失败");

			}


		}else{
			$this->display();
		}



		
	}
	public function showList(){
		$model=M('Knowledge');
		$data=$model->select();
		$this->assign('data',$data);

		$this->display();
		
	}
	public function download(){

		$id=I('get.id');
		$data=M('Knowledge')->find($id);
		$file=WORKING_PATH.$data['picture'];

		header("Content-type: application/octet-stream");
		header('Content-Disposition: attachment; filename="' . basename($file) . '"');
		header("Content-Length: ". filesize($file));
		//输出缓冲区
		readfile($file);

	}

}