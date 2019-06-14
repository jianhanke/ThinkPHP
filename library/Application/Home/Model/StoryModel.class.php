<?php 

namespace Home\Model;
use Think\Model;
class StoryModel extends Model{

	public function show_story(){
		
		return $this->field('story_name,story_id')->select();
		
	}
	public function get_path(){
		$book_id=I('get.book_id');
		return $this->field('story_path')->find($book_id)['story_path'] ;
		

	}


}