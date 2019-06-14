<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Home/css/base.css" />
<link rel="stylesheet" href="/Public/Home/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/Public/Home/images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 8px;
	    width: 240px;
	}
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>修改密码</h2></div>
<form action="/index.php/Home/Person/change_pwd" method="post">
<div class="main">

	
	<p class="short-input ue-clear">
    	<label>新 密  码：</label>
        <input name="new_pwd" type="text"  />
    </p>
	       
    <!-- <?php echo '<?php echo ($datas["user_sex"]); ?>' == '男' ? 'checked="checked"' : '' ?> -->
	<p class="short-input ue-clear">
    	<label>再输入密码：</label>
        <input type="text" name="new_pwd2" />
    </p>
	
  
</div>

<div class="btn ue-clear">
	<a class="confirm" id='btnSubmit'>确认修改</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
	$('#btnSubmit').on('click',function(){
		$('form').submit();
	});
	
	$('#btnReset').on('click',function(){
		$('form')[0].reset();
	});
});	

$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');
</script>
<script>
</script>
</html>