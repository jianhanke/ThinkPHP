<?php 

namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{

	public function login(){
    	$this->display();
    }

  	   public function checkLogin(){

        if(IS_POST){
            $model=M('user');
            $post=I('post.');
            $data=$model-> where($post)->find();
            if($data){
                session('user_id',$data['user_id']);
                session('user_name',$data['user_name']);
            $this->success('登录成功', U('Home/Index/index'));
        }else{
            $this->error('账号或密码错误',U('Home/Index/login')); 
        }
        	
            }
    }

    public function logout(){
    	session(null);
    	$this->success('退出成功',U('Home/Login/login'));
    }

    public function register(){
        if(IS_POST){
            $user_id=I('post.user_id');
            $user_pwd=I('post.user_pwd');
            $user_pwd2=I('post.user_pwd2');
            if($user_pwd!=$user_pwd2){
                $this->error('两次密码不一样');
            }else{
                $model=D('User');
                $status=$model->find($user_id);
                if($status){
                    $this->error('账号已存在,请更换账号');
                }else{
                     $result=$model->register_user();
                if($result=1){
                    $this->success('注册成功',U('Home/login/login'));
                }else{
                    $this->error('注册失败');
                }
            }

               
            }
   
        }else{
            $this->display();
        }
        
        
    }


}