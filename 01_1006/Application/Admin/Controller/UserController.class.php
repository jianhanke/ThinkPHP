<?php 

namespace  Admin\Controller;
use Think\Controller;

class UserController extends Controller{

	public function add(){


		if(IS_POST){
			$model=M('User');
			$data=$model->create();
			$data['addtime']=time();
			$result=$model->add($data);

			if($result){
				$this->success('添加成功',U('showList'),3);
			}else{
				$this->error('添加失败!');
			}
		}else{
		$data=M('Dept')->field('id,name')->select();
		$this->assign('data',$data); 
		$this->display();
		}
	}
	public function showList(){

		$model=M('User');

		//分页显示
		$count=$model->count();
		$page=new \Think\Page($count,1);
		$page->setConfig('preg','上一页');
		$page->setConfig('next','下一页');
		$page->setConfig('last','末页');
		$page->setConfig('firts','首页');
		$show=$page->show();
		//dump($show);
		$datas=$model->limit($page->firstRow,$page->listRows)->select();

		$this->assign('datas',$datas);
		$this->assign('show',$show);
		$this->assign('count',$count);
		$this->display();
	}
	public function charts(){

		//select t2.name as deptname,count(*) as count from sp_user as t1,
		//sp_dept as t2 where t1.dept_id=t2.id group by deptname;
		
		$model=M();
		$data=$model->field('t2.name as deptname,count(*) as count') ->
		table('sp_user as t1,sp_dept as t2') -> where ('t1.dept_id=t2.id')
		->group('deptname')-> select();
		$str='[';
		foreach ($data as $key => $value){
			$str .=" ['" . $value['deptname']. "'," .$value['count'] ."],";
		}
		$str=rtrim($str,',').']';
		dump($str);
		$this->assign('str',$str);
		$this->display();

	}



}