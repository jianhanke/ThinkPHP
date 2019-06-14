<?php 

namespace Admin\Model;
use Think\Model;

class BooksModel extends Model{

	public function show_book_info(){

		$count=$this->count();
			$page=new \Think\Page($count,20);
			$page->rollPage=10;
			$page->lastSuffix=true;
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('first','首页');
			$page->setConfig('last','末页');

			$show=$page->show();
			$data=$this->limit($page->firstRow,$page->listRows)->order('id desc ' ) ->select();
		$info['count']=$count;
		$info['show']=$show;
		$info['data']=$data;
		return $info;
	}
	public function show_modify_book(){
				$id=$_GET['id'];
			   return $this->find($id);

	}
	public function delete_book(){
		$id=$_GET['id'];
		return $this->delete($id);
	}
	public function show_haved_borrow(){
				$post=I('post.');
				$search_sort=$post['search-sort'];
				$keywords=$post['keywords'];
				$sub=$post['sub'];
				
				# $sql="select * from books where $search_sort like '%$keywords%' ;";
			$sql="select t1.*,t2.user_id from books as t1,user as t2 where t1.now_borrow = t2.user_id  and $search_sort like '%$keywords%' ; ";
			$count_sql="select count(*) from books as t1,user as t2 where t1.now_borrow = t2.user_id  and $search_sort like '%$keywords%' ; ";
				$info['data'] =$this->query($sql);
				$info['count'] =$this->query($count_sql);
				return $info;
	}
	public function show_borrow_book(){

		$info['count'] =$this->table('books as t1,user as t2') 
						->where('t1.now_borrow= t2.user_id')
						->count();
			$page=new \Think\Page($count,20);

			$page->rollPage=10;
			$page->lastSuffix=true;
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('first','首页');
			$page->setConfig('last','末页');

			$show=$page->show();
			// $data=$model->limit($page->firstRow,$page->listRows)->select();
			$info['data'] =$this->field('t1.*,t2.user_name')
						->table('books as t1,user as t2') 
						->where('t1.now_borrow= t2.user_id')
						// ->limit($page->firstRow,$page->listRows)
						->select();

			return $info;

	}


}