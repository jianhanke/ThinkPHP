<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>移动办公自动化系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/Public/Admin/images/inputbg.png") repeat-x scroll 0 0;
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
<div class="title"><h2>信息登记</h2></div>
<form action="" method="post">
<div class="main">

	<p class="short-input ue-clear">
    	<label>账户:</label>
        <input name="user_id" type="text" value="<?php echo ($data["user_id"]); ?> " />
    </p>
	<p class="short-input ue-clear">
    	<label>姓名：</label>
        <input name="user_name" type="text" value="<?php echo ($data["user_name"]); ?> " />
    </p>
	       
    <!-- <?php echo '<?php echo ($datas["user_sex"]); ?>' == '男' ? 'checked="checked"' : '' ?> -->
	<p class="short-input ue-clear">
    	<label>性别：</label>          
    	<input name="user_sex" type="radio" value="男"    <?php echo ($sex=='男'?'checked' : ''); ?>  />男
		
		<input name="user_sex" type="radio" value="女" <?php echo ($sex=='女'?'checked' : ''); ?>  />女
    </p>
	<p class="short-input ue-clear">
    	<label>电话：</label>
        <input type="text" name="user_tele" value="<?php echo ($data["user_tele"]); ?> " />
    </p>
	
	<p>  <?php  echo "<?php echo ($man); ?>".'<?php echo ($women); ?> ' ?> 22; </p>
  
</div>

<div class="btn ue-clear">
	<a class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>清空内容</a>
</div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
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