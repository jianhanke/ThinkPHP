<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/Public/Admin/css/login.css" />
	<title>图书管理后台系统</title>
</head>
<body>
	<div id="container">
        <form action="/index.php/Admin/Login/verifyLogin " method="post">
		<div id="bd">
			<div class="login1">
            	<div class="login-top"><h1 class="logo"></h1></div>
                <div class="login-input">
                	<p class="user ue-clear">
                    	<label>用户名</label>
                        <input type="text"  name="id" />
                    </p>
                    <p class="password ue-clear">
                    	<label>密&nbsp;&nbsp;&nbsp;码</label>
                        <input type="password" name="pwd" />
                    </p>
                    <p class="yzm ue-clear">
                    	<label>验证码</label>   
                        <input type="text"  name="captcha" maxlength="5" />
                        <cite><img style="margin-right:-10px;height:40px;" src="/index.php/Admin/Login/captcha/" alt=""
                        onclick="this.src='/index.php/Admin/Login/captcha/t/'+Math.random() " 
                        > </cite>
                        <!--  添加后面的参数， 是因为有的浏览器不支持 -->
                    </p>
                </div>
                <div class="login-btn ue-clear">
                	<a  class="btn">登录</a>
                    <div class="remember ue-clear">
                    	<input type="checkbox" id="remember" />
                        <em></em>
                        <label for="remember">记住密码</label>
                    </div>
                </div>
            </div>
		</div>
        </form>
	</div>
    <div id="ft">CopyRight&nbsp;2014&nbsp;&nbsp;版权所有&nbsp;&nbsp;uimaker.com专注于ui设计&nbsp;&nbsp;苏ICP备09003079号</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
var height = $(window).height();
$("#container").height(height);
$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
	var height = $(window).height();
	$("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
	$("#container").height(height);
	
});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
	checkRemember($(this));
});

function checkRemember($this){
	if(!-[1,]){
		 if($this.prop("checked")){
			$this.parent().addClass('checked');
		}else{
			$this.parent().removeClass('checked');
		}
	}
}
$(function(){
    $('.btn').on('click',function(){
        $('form').submit();
    });
});


</script>
</html>