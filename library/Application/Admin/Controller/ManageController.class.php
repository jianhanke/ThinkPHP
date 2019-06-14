<?php 

namespace Admin\Controller;

class ManageController extends CommonController{

		public function showList(){

			$model=D('Books');
			if(IS_POST){
				$post=I('post.');
				$search_sort=$post['search-sort'];
				$keywords=$post['keywords'];
				$sub=$post['sub'];
				
				$sql="select * from books where $search_sort like '%$keywords%' ;";
			
				$data=$model->query($sql);
				$this->assign('data',$data);
				$this->display();
			}else{
				$info=$model->show_book_info();

				$this->assign('show',$info['show']);
				$this->assign('data',$info['data'] );
				$this->assign('count',$info['count']);
				
				$this->display();
			}

		}
		public function modify(){

			
			if(isset($_GET['id'])){
				$model=D('Books');
				$result=$model->show_modify_book();
			   $this->assign('data',$result);
			}
			if(IS_POST){ 

				$post=I('post.');
						//加上[''] ，否则不上传文件，也会显示有文件的
				if(!empty($_FILES['picture']['tmp_name'])){  //如果包含图片,执行下面的
				$postfix=strrchr($_FILES['picture']['name'], '.');
				$now_time=time();
   				$save='E:/wamp/apache/library/Public/books/' .$now_time."$postfix";
   				$new_name=$now_time.$postfix;

    			move_uploaded_file($_FILES['picture']['tmp_name'],$save);
    			$new_thumb_path=$this->one_thumb($save,$new_name);
				$post['picture']=$save;
				$post['thumb_picture']=$new_thumb_path;
				
			}	

				$model=M('books');                 
				$result=$model->save($post);
				 
				if($result){
					$this->success('修改成功',U('Admin/Manage/showList'));
				}else{
					$this->error('修改失败');
				}
				
			}else{
				$this->display();
			}

			
		}
		public function one_thumb($path,$new_name){    //制造一个缩略图 ，上传文件时调用
			$new_path="E:/wamp/apache/library/Public/books/thumb_".$new_name;			
			$image=new \Think\Image();
			$image->open($path);
			$image->thumb(150,150)->save($new_path);

			$thumb_path="/public/books/thumb_".$new_name;
			return $thumb_path;

		}

		public function thumb(){
			
			//用的时候，放在上面运行即可,这里不可以
			$model=M('books');
			$datas=$model->select();
			foreach ($datas as $v){
				
				$image=new \Think\Image();
				$path= $v['picture'];
				$book_name=$v['book_name'];
				$id=$v['id'];

				$new_path="E:/wamp/apache/library/Public/books/thumb_".$book_name.".jpg";
				$new_thumb="/public/books/thumb_".$book_name.".jpg";
				$image->open($path);
				$image->thumb(150,150)->save($new_path);

				$model  -> id=$id;
				$model -> thumb_picture=$new_thumb;
				$model ->save();
			}
			
			
		}
		public function add(){

			if(IS_POST){
				$post=I('post.');

				// isset 是否为存在
				// empty 是否位空 
				// FILES 只能用 empyt ，因为就算没上传文件，也是存在的 

				if(!empty($_FILES['picture']['tmp_name'])){

				$postfix=strrchr($_FILES['picture']['name'], '.'); //最后一次出现在 . 从当前位置到结束
					$now_time=time();
	   				$save='E:/wamp/apache/library/Public/books/' .$now_time."$postfix";
	   				$new_name=$now_time.$postfix;

	   				move_uploaded_file($_FILES['picture']['tmp_name'],$save);
	    			
	    			$new_thumb_path=$this->one_thumb($save,$new_name);
					$post['picture']=$save;
					$post['thumb_picture']=$new_thumb_path;

				}

				$model=M('books');
				$result=$model->add($post);
				if($result){
					$this->success('添加成功');
				}else{
					$this->error('失败');
				}
			}else{
				$this->display();
			}
			
		}

		public function delete(){
			$model=D('Books');
			$result=$model->delete_book();
			if($result){
				$this->success('删除成功',U('Manage/showList') );
			}else{
				$this->error('删除失败');
			}

		}
		public function haved_borrow(){

			$model=D('Books');
			if(IS_POST){  //搜过功能
				$info=$model->show_haved_borrow();
				$this->assign('data',$info['data']);
				$this->assign('count',$info['count']);
				$this->display();
			}else{
			// $record_model=M('record');
			// $user_model=M('user');
			// $books_model=M('books');

			// $data=$record_model->field('t2.book_name,t3.user_name ')
			// 			->table('record as t1,books as t2, user as t3 ')
			// 			->where('t1.status=1  AND t2.status=1 ')
			// 			->select();
			// 	dump($data);die;


			$info=$model->show_borrow_book();

				$this->assign('show',$info['show']);
				$this->assign('data',$info['data'] );
				$this->assign('count',$info['count'] );
				$this->display();
			}
			
		}

		public function no_borrow(){

			$model=M('books');

			if(IS_POST){
				$post=I('post.');
				$search_sort=$post['search-sort'];
				$keywords=$post['keywords'];
				$sub=$post['sub'];
				
				$sql="select * from books where $search_sort like '%$keywords%' ;";
				$data=$model->query($sql);
				$this->assign('data',$data);
				$this->display();
			}else{

			$count=$model->where("status = 0  " ) 
						->limit($page->firstRow,$page->listRows)
						->count();
			

			$page=new \Think\Page($count,20);
			$page->rollPage=10;
			$page->lastSuffix=true;
			$page->setConfig('prev','上一页');
			$page->setConfig('next','下一页');
			$page->setConfig('first','首页');
			$page->setConfig('last','末页');

			

			$data=$model->where("status = 0  " ) 
						->limit($page->firstRow,$page->listRows)
						->select();
			$show=$page->show();

			$this->assign('show',$show);
			$this->assign('data',$data);
			$this->assign('count',$count);

			$this->display();
			}
		}
}