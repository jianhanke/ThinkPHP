<?php 

namespace Home\Controller;

class RankController extends CommonController{

	public function book_rank(){

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
	public function press_rank(){
		$model=M('books');
		$sql2="select distinct press from books";
		$all_press=$model->query($sql2);

		$data=array();

		foreach ($all_press as $v){
			$press_name=$v['press'];
			$result=$model->where("press='$press_name'")->count();
			
			if($result>1){
				$all_info=array();
				$all_info['press_name']=$press_name;
				$all_info['num']=$result;
				$data[]=$all_info;
			}

		}
		
		
		for($i=0,$len=count($data);$i<$len-1;$i++){
			for($j=$i+1;$j<$len;$j++){
				if($data[$i]['num'] <$data[$j]['num'] ){
					$temp=$data[$i];
					$data[$i]=$data[$j];
					$data[$j]=$temp;
				}
			}
		}
		$data=array_slice($data,0,10);
		$nums=count($data);
		$this->assign('nums',$nums);
		$this->assign('data',$data);
		$this->display();
	}


}