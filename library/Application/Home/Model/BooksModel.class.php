<?php 

namespace Home\Model;
use Think\Model;

class BooksModel extends Model{


	public function check_books_status(){
		

			$count=$this->limit($page->firstRow,$page->listRows)
					// ->where("now_borrow IS NULL OR now_borrow ='' ")
					->where("status = 0 ")
					  ->count();
			$page=new \Think\Page($count,20);
			$page->rollPage=10;
			$page->lastSuffix=true;
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('first','首页');
			$page->setConfig('last','末页');

			$show=$page->show();

		 $result=$this->limit($page->firstRow,$page->listRows)
					// ->where("now_borrow IS NULL OR now_borrow ='' ")
					->where("status = 0 ")
					  ->select();
		$info['result']=$result;
		$info['count']=$count;
		$info['show']=$show;
		return $info;
	}
	public function borrow_now_book(){

			$book_id=I('get.id');
			$user_id=Session('user_id');

		$now_status=$this->field('status')->where("id =$book_id ")->find();

		if($now_status['status'] ==0){
			$this->where("id = $book_id");
			$this->status=1;
			$this->now_borrow=$user_id;
			$this->update_reocrd_status($book_id,$user_id,1);
			return $this->save();
		}

	}

	public function show_borrow_book(){

		$record_model=M('record');
		$user_id=Session('user_id');


		$count=$record_model->field('book_id')
		 						->limit($page->firstRow,$page->listRows)
		 						// ->table('record as t1,books as t2 ' )
		 						->where("user_id=$user_id AND status=1 ")
								->count();


			$page=new \Think\Page($count,20);
			$page->rollPage=10;
			$page->lastSuffix=true;
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('first','首页');
			$page->setConfig('last','末页');
			$show=$page->show();

			// dump($borrow_books);

			$sql="select * from books where id IN (select book_id from record where user_id=$user_$user_id and status=1)";
			$data=$this->query($sql);

			$info['data']=$data;
			$info['show']=$show;
			$info['count']=$count;
			return $info;

	}
	public function return_book(){

			$book_id=I('get.id');
			$user_id=Session('user_id');
	
			// $now_borrow['now_borrow']='';
			$this->status=0;
			$this->now_borrow='';
			$this->where("id =$book_id");
			
			$this->update_reocrd_status($book_id,$user_id,0);
			return $this->save();
	}

	public function update_reocrd_status($book_id,$user_id,$status){
		// $book_model=M('books');
		$record_model=M('record');

		$post['book_id']=$book_id;
		$post['user_id']=$user_id;
		if($status==0){

			$record_model->status=0;
			$record_model->where($post)->save();

		}else{
			$info['book_id']=$book_id;
			$info['user_id']=$user_id;
			$info['status']=$status;
			$record_model->add($info);
		}

	}

	public function search_keyword(){
		$search_idex=I('post.search-sort');
		$search_keyword=I('post.keywords');  // %表示任意长度的， _表示任意一个
		$sql="select * from books where $search_idex like '%$search_keyword%' ";
		return $this->query($sql);


	}

}
