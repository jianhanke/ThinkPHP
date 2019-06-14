<?php 

namespace Admin\Model;
use Think\Model;

class UserModel extends Model{

	public function show_info(){

		$count=$this->count();
		$page=new \Think\Page($count,20);
		$page->setConfig('prev','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('first','首页');
		$page->setConfig('last','末页');
		$page->rollPage=10;
		$page->lastSuffix=true;

		$show=$page->show();
		$result=$this->limit($page->firstRow,$page->listRows)
						->select();
		$info['result']=$result;
		$info['count']=$count;
		$info['show']=$show;
		return $info;
	}
	public function show_user_info(){
		
		$id=I('GET.id');
		$info=$this->find($id);
		return $info;
	}
	public function modify_user_info(){
		$post=I('post.');  //全部信息不是 post.*
		return $this->save($post);
	}
	public function add_user_info(){

		$post=I('post.');
		return $this->add($post);

	}


}