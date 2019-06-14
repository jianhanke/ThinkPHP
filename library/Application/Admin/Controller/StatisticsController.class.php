<?php 

namespace Admin\Controller;
use Think\Controller;

class StatisticsController extends Controller{

	public function sex(){
		$model=M('user');

		$men=$model->where("user_sex='男' ")->count();
		$women=$model->where("user_sex='女' ")->count();
		$empty_sex=$model->where("user_sex IS NULL OR user_sex='' ")->count();
		
		$data_num=array($men,$women,$empty_sex);


		$this->assign('data_num',$data_num);

		$this->display();
	}

	public function books(){
		$model=M('record');
		$sql2="select distinct book_id from record  ";
		$person=$model->query($sql2);
		$data=array();

		foreach ($person as $v){
			$id=$v['book_id'];
			$sql="select  t1.book_name, t2.book_id,count(t2.book_id) as num from books as t1, record as t2 where t2.book_id =$id AND t1.id=$id  " ;
			$result=$model->query($sql);
			if($result[0]['num']>1){
				$data[]=$result;
			}

		}
		for($i=0,$len=count($data);$i<$len-1;$i++){
			for($j=$i+1;$j<$len;$j++){
				if($data[$i][0]['num']<$data[$j][0]['num']){
					$temp=$data[$i];
					$data[$i]=$data[$j];
					$data[$j]=$temp;
				}
			}
		}
		
		$data=array_slice($data,0,5);
		$count=count($data);
		$this->assign('count',$count);
		$this->assign('data',$data);
		$this->display();
	}

}