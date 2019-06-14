<?php 

namespace Admin\Controller;

class RecordController extends CommonController{

	public function circulate_record(){

		$all_info=array();
		$record_model=M('record');
		$book_model=M('books');
		$user_model=M('user');

		echo '测试2';
		$all_book_id=$record_model->field('book_id')->Distinct(true)->select();

		foreach ($all_book_id as $v){ 
			$now_id= $v['book_id'];	
			$one_book=array();
			$book=array();

			$one_book['book_id']=$now_id;
			$one_book[]=$record_model->field('user_id')
									->where("book_id = $now_id ")
									->select();
			$one_book['book_name']=$book_model->field('book_name')->where("id=$now_id")->find()['book_name'];
			$all_info[]=$one_book;

		}
		foreach ($all_info as &$v){
			$all_user_id=$v[0];	
			foreach($v[0] as $k=> &$v2){
				$now_user_id=$v2['user_id'];
				$book=array();
			$book['user_id'] =$user_model->field('user_name')->where("user_id=$now_user_id")->find()['user_name'];
				$v2=$book;   
			}
		}
		
		
	 

		for ($i=0 ,$len=count($all_info) ;$i<$len-1;++$i){  //简单排序, 
			for ($j=$i+1 ;$j<$len ;++$j){
				if( count($all_info[$i]) < count($all_info[$j] ) ){
					$temp=array();
					$temp=$all_info[$i];
					$all_info[$i] =$all_info[$j];
					$all_info[$j]=$temp;
				}
			}
		}

		// $arr=array(
		// 	array(
		// 	'1'=> '测试1',
		// 		),
		// 	array(
		// 	'1'=>'测试2',
		// 		),
		// 	);
		// foreach($arr as $v){
		// 	echo $v[1];
		// }


		// dump($arr);die;

		$this->assign('datass',$all_info);
		$this->display();

	}


}