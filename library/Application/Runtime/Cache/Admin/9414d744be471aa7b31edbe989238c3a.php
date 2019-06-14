<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息登记</h2></div>
			
<form action="" method="post" enctype="multipart/form-data" >
	<div class="main">
	    <p class="short-input ue-clear">
	    	<label>书名：</label>
	        <input type="text" name="book_name"  />
	    </p>
	    <p class="short-input ue-clear">
	    	<label>图片</label>
	    	<input type="file" name="picture" >
	    </p>
	    <p class="short-input ue-clear">
	    	<label>作者</label>
	        <input type="text" name="author">
	    </p>
	    <p class="short-input ue-clear">
	    	<label>出版社</label>
	        <input type="text" name="press">
	    </p>

		<p class="short-input ue-clear">
	    	<label>备注</label>
	        <input type="text" name="remark">
	    </p>

	</div>
	<div class="btn ue-clear">
		<a href="javascript:;" class="confirm">确定</a>
	    <a href="javascript:;" class="clear">清空内容</a>
	</div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

$(function(){
	//给确定按钮绑定点击事件
	$('.confirm').on('click',function(){
		$('form').submit();
	});

	//给清空按钮绑定点击事件
	$('.clear').on('click',function(){
		$('form')[0].reset();
	});
});

showRemind('input[type=text], textarea','placeholder');
</script>
</html>