<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/home.css" />
<title>图书后台管理系统</title>
</head>

<body>
        
        <h2> 正在完善中。。。。。。。。</h2>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
$(".title-list ul").on("click","li",function(){
    var aIndex = $(this).index();
    $(this).addClass("current").siblings().removeClass("current");
    $(".matter-content").removeClass("current").eq(aIndex).addClass("current");
});

$(".duty").find("tbody").find("tr:even").css("backgroundColor","#eff6fa");
</script>
</html>