<?php 
namespace Admin\Controller;
use Think\Controller;
//use Think\Verify;

class TestController extends Controller{
	public function test(){
		$var=date('Y-m-d H:i:s',time());
		$this->assign('var',$var);


		$this-> display();
	}
	public function test1(){
		$this->display();
	}

	public function test2(){      //整个方法可以不写，display 必须写
		$this->display();
	}
	public function test3(){
		
	}

	public function test4(){
		$array=array('西游记','三个女人和105个男人的故事','一个男人和一堆女人的故事','三国演义');
		$this->assign('array',$array);
		$array2=array(
			array('白骨精','大师兄','二师兄','沙师弟'),
			array('宋江','孙二娘','林冲','李逵'),
			array('贾宝玉','刘姥姥','薛宝钗','林黛玉'),
			array('村中山','鲁大师','孙晓书','书吧')
			);
		$this->assign('array2',$array2);
		$this->display();
	}

	public function test9(){	//变量分配
		$stu=new Student();
		$stu -> id=100;
		$stu -> name='马冬梅';
		$stu -> sex='女';
		
		$this->assign('stu',$stu);
		$this->display();
	}
	public  function test10(){
		$this->display();
	}
	public function test11(){
		$time=time();
		$this->assign('time',$time);
		$this->display();
	}
	public function test12(){
		$sign='';
		$this->assign('sign',$sign);
		$this->display();
	}

	public function test13(){
		$a=100;
		$b=10;
		$this->assign('a',$a);
		$this->assign('b',$b);
		$this->display();
	}
	public function head(){
		$this->display();
	}
	public function body(){
		$this->display();
	}
	public function foot(){
		$this->display();	
	}
	public function test14(){
		$array=array('西游记','三个女人和105个男人的故事','一个男人和一堆女人的故事','三国演义');
		
		$array2=array(
			array('白骨精','大师兄','二师兄','沙师弟'),
			array('宋江','孙二娘','林冲','李逵'),
			array('贾宝玉','刘姥姥','薛宝钗','林黛玉'),
			array('村中山','鲁大师','孙晓书','书吧')
			);
		$this->assign('array',$array);
		$this->assign('array2',$array2);
		$this->display();
	}

	public function test15(){
		$day=date('N',time());

		$this->assign('day',$day);
		$this->display();
	}
	public function test16(){
		$this->display();
	}

	public function test17(){
		//实例化模型
		$model=M('Dept');
		//查询
		$data=$model->select();
		//echo $model->getLastSql();
		echo $model->_sql();
	}

	//性能测试
	public function test18(){
		//定时开始标记
		G('start');	
			for($i=0;$i<100000;$i++){
				echo " $i";
			}
			
		G('stop');
		echo '<hr>';
		echo G('start','stop',4);   //微秒 精确到4位小数
	}

	//AR模式增加操作
	public function test19(){
		$model=M('Dept');
		$model-> name ='技术部';
		$model-> pid ='0';
		$model-> sort ='3';
		$model-> remark ='这是本人的测试';
		$result=$model->add();
		dump($result);
	}
	public function test20(){
		$model=M('Dept');
		$model-> id='2';
		$model-> name='persheng';
		$model-> pid='0';
		$model-> sort='2';
		$model-> remark='正在用ar模式的save';
		$result=$model->save();
		dump($result);
			//返回值是 查询数
	}
	public function test21(){
		$model=M('Dept');
		$model->id='2,15';
		$result=$model->delete();
		dump($result);

	}
	public function test23(){
		$model=M('Dept');
		$model->where('id>10');
		$data=$model->select();
		dump($data);

	}
	public function test24(){
		$model=M('Dept');
		//$model->limit(3);  //查询前三条  第一种查询
		// $data=$model->select();
		// 
		$model->limit(1,1);  //从第一个查询，查询一条记录,  第二种查询
		$data=$model->select();
		dump($data);
	}

	public function test25(){
		$model=M('Dept');
		$model->field('id,name');
		$data=$model->select();
		dump($data);
	}

	public function test26(){

		$model=M('Dept');
		$model->order('id asc');
		$data=$model->select();
		dump($data);
	}

	public function test27(){

		$model=M('Dept');
		$model->group('sort');    //查询的结果 已'sort'为分组
		$model->field('name,count(*) as count');
		$data=$model->select();
		dump($data);
	}
	//  $this指向模型类
	public function test28(){
		$model=M('Dept');

		// $model->field('name,count(*) as count');
		// $model->group('sort');
		// $data=$model->select();
		// 
		$data=$model->field('name,count(*) as count')->group('sort')->select();
		//切记, 灭一个辅助方法最后返回值都是$this ，所有有好几个$this->
		dump($data);

	}
	public function test29(){
		$model=M('Dept');
		$ceshi=$model->count();  //返回值是系统是包装好的 tp_count
		dump($ceshi);
	}
	public function test30(){
		$model=M('Dept');
	//	$max=$model->max('sort');
		dump($model->max('sort'));
	}

	public function test31(){
		$model=M('Dept');
		$min=$model->min('sort');
		dump($min);
	}
	public function test32(){
		$model=M('Dept');
		$avg=$model->avg('sort');
		dump($avg);
	}
	public function test33(){
		$model=M('Dept');
		$sum=$model->sum('sort');
		dump($sum);
	}
	//方法有 count max min sum avg
	public function test34(){
		$model=M('Dept');

		$data=$model->field('name,count(*) as count')->fetchSql(true)->group('sort')->select();
		dump($data);
			//fetchSql 不会执行，不会报错
			//fetSql在model之后 在CURD之前
	}
	//测试 
	public function  test35(){

		$model=D('Szphp');

		dump($model);
	}
	public function test36(){
		//1.设置
		session('name','韩梅梅');
		session('name2','李雷');
		dump($_SESSION);

		//2,读取单个
		$value=session('name');
		dump($value);
	
		//3，清空单个
		session('name2',null);
		dump($_SESSION);

		//4,删除全部
		 session('name3','马冬梅');
		// session(null);
		// dump($_SESSION);

		//5,读取全部
		dump(session());

		//判断某个session是否存在
		dump(session('?name3'));

	}

	public function test37(){

		//1,设置有没有有效期的cookie
		cookie('name','xialuo');
		//2,设置带有有效期的的cookie
		cookie('name2','shashibiya',20);

		//3,获取单个cookie的值
		dump(cookie('name2'));

		//4，清空单个cookie
		cookie('name',null);
		dump(cookie());
		//5,清空全部 cookie
		cookie(null);
		dump(cookie());

	}
	//定义应用函数，能在整个分组用，定义分组函数能在此分组使用
	//不需要引用,系统在执行中有自动帮我们引入文件
	
	public function test38(){
		gbkutf8();
	}
	//测试load_ext_file引入
	public function test39(){

		//使用函数
		getInfo();
	}
	public function test40(){

		load('@/hello');
		sayhello('Wrold');		
	}

	//常规验证码
	public function test41(){

		$cfg=array(
		'fontSize'  => 12,
		'useCurve'  =>  false,            // 是否画混淆曲线
        'useNoise'  =>  false,            // 是否添加杂点	
        'imageH'    =>  0,               // 验证码图片高度
        'imageW'    =>  0,               // 验证码图片宽度
        'length'    =>  4, 
        'fontttf'   =>   '4.ttf',
			);
		//实例化验证码类
		$verify  = new \Think\Verify($cfg);
		//输出验证码
		$verify->entry();
	}
	//中文验证码
	public function test42(){
		//配置
		$cfg=array(
			'useZH'   	=> 	true,
			'fontSize'  => 	12,
			'useCurve'  =>  false,            // 是否画混淆曲线
        	'useNoise'  =>  false,
        	'length'    =>  4,
			);
		$verify=new \Think\Verify($cfg);
		$verify ->entry();
	}

	public function test43(){
			//原生态方法执行 sql语句
		$model=M();
		// $sql="select t1.*,t2.name as deptname from sp_user as t1,sp_dept as t2 where t1.dept_id=t2.id";
		// $result=$model->query($sql);
		// dump($result);
		
		$result=$model->field('t1.*,t2.name as deptname') ->table('sp_user as t1,sp_dept as t2') ->where('t1.dept_id=t2.id') ->select();
		dump($result);
		
	}
	public function test44(){

		$model=M('Dept');
		//连表查询
		//select t1.*,t2.name as deptname from sp_dept as t1 left join sp_dept as t2 on
		// t1.pid=te.id;
		$result=$model->field('t1.*,t2.name as deptname')->alias('t1')->
		join('left join sp_dept as t2 on t1.pid = t2.id')->select();
		dump($result);		
	}

	//ip获取
	public function test45(){
		echo get_client_ip(1);
	}
	//ip对应的物理地址
	public function test46(){
		$ip=new \Org\Net\IpLocation('qqwry.dat');
		$ss=I('get.ip');
		$data=$ip -> getlocation($ss);
		dump($data);
	}

}






 