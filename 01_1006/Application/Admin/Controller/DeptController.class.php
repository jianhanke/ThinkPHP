<?php 

namespace Admin\Controller;



class DeptController extends CommonController{
	public function shilihua(){
		//$model=new \Admin\Model\DeptModel();
		//$model=D('dept');
		//$model=D();
		//$model=M('dept');
		$model=M();
		dump($model);
	}

	//add方法使用
	public function tianjia(){
		$model=M('Dept');
		//声明数组（关联数组）
		// $data=array('name' => '财务部',
		// 			'pid'  =>  '0',
		// 			'sort' =>  '2',
		// 			'remark' => '这是财务部门'
		// 			);
		// $result=$model -> add($data); //增加操作
		// 
		$data=array(
					array(

							'name' => '财务部','pid'=>'0',
							'sort'=>'3',
							'remark'=>'公共关系维护',
						),
					array(
						'name' => '董事部','pid'=>'0',
						'sort'=>'4',
						
						'remark'=>'权力最高部门'
						)

			);
		$result=$model -> addAll($data);
		dump($result);  //add方法返回新增记录的id
		//切记  切记 切记  切记
		//二维数组用的是 addAll 比一维数组多一个ALL
		//二维数组一定要顺序一样
		
	}
	public function xiugai(){
		$model=M('dept');
		$data=array(
			//'id'=>'1',  没有id是指修改所有数据,但是ThinkPHP不会让次行为发生 返回false
			'sort'=>'23',
			'remark'=>'今天发工资'
			);
		$result=$model->save($data);
		dump($result);
		//false,表示修改操作并没有执行，而不是mysql执行失败.

	}

	public function chaxun(){
		$model=M('Dept');

		//select 部门  select查询结果是一个二位数组
		$data=$model->select();	//不填默认查询所有
		$data=$model->select('1,2,9');  //查询多个 和查询一个不一样
		$data=$model->select(1);


		//find
		$data=$model->find();  //不填默认查第一个记录,而不是第一个id
		$data=$model->find(10); //只能查询一个记录
		dump($data);
	}
	public function shanchu(){
		$model=M('Dept');

		$result=$model->delete();  //返回值 false  
		$result=$model->delete(12);
		$result=$model->delete('10,11');  //返回值是删除个数

		dump($result);
	}
	//删除分为 物理删除，和逻辑删除
	//逻辑删除，是指假的删除，没有被删除，可以理解为被隐藏起来了
	//比如 一个数据状态码为0，1  查询时候读取状态为1,当用户执行删除后，
	//状态码改为0, 将会查询不到
	//
	//
	//
	//add方法
	public function add(){

		if(IS_POST){     //判断请求类型
			//$post=I('post.');
			$model=D('Dept');
			$data=$model->create();   //不传递参数则接受post数据
			if(!$data){
				//echo $model->getError(); die;
				//dump($model->getError());die;
				$this->error($model->getError());exit;
			}
			
			$result=$model->add();
			// $result=$model->add($post);
			if($result){
				$this->success('tianjiachengg ',U('showList'),3);
			}else{
				$this->error('添加失败');
			}
		}else{   //如果不是post展示模板
				//查询出顶级部门
		$model=M('Dept');
		$data=$model->where('pid=0')->select();
		//select返回是二维数组，所有需要遍历
		$this->assign('data',$data);
		//展示模板
		$this->display();
		}
	}
	public function showList(){

		$model=M('Dept');
		$data=$model->order('sort asc')-> select();
		foreach ($data as $key => $value){
			
			if($value['pid']>0){
			$info=$model->find($value['pid']);
			$data[$key]['deptname']=$info['name'];
			}
			//$data[$key]
		}	
		load('@/tree');
		$data=getTree($data);
		
		$this->assign('data',$data);
		$this->display();
	}
	public function edit(){

		if(IS_POST){
			$post=I('post.');
			$model=M('Dept');
			$result=$model->save($post);
			if($result !==false){
				$this->success('修改成功',U('showList'),3);
			}else{
				$this->error('修改失败');
			}
		}
		else{
		$id=I('get.id');
		$model=M('Dept');
		$data=$model->find($id);
		$info=$model->where("id!=$id") ->select();
		$this->assign('data',$data);
		$this->assign('info',$info);
		$this->display();
		}
	}

	public function del(){
		$id=I('get.id');
		$model=M('Dept');
		$result=$model->delete($id);
		if($result){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
	public function ceshi(){
		$model=M('Dept');
		$result=$model->select();
		dump($result);
	}

}