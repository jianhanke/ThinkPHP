<?php 

namespace Admin\Model;
//引入父类模型
use Think\Model;
//规则是定义在自定义模型是，所有模型实例化需要用D（）

class DeptModel extends Model{
	
	protected $patchValidate=true;
	protected $_map    		=array(
			//y映射规则
			//键是表单中的name=值是数据库的键
			'abc'            => 'name',
			'wasd'            => 'sort',
		);
	protected $_validate =array(
		array('name','require','部门名称不能为空'),
		array('name','','部门已存在',0,'unique'),

		//array('sort','number','排序必须是数字'),
		//使用函数验证number 是数字
		array('sort','is_numeric','排序必须是数字',0,'function'),

		);

	
}

