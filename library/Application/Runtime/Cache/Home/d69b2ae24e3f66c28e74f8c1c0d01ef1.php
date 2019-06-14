<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Home/css/base.css" />
<link rel="stylesheet" href="/Public/Home/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Home/css/WdatePicker.css" />
<title>移动办公自动化系统</title>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>

<div class="table-box">
<form action="" method="post" >
                    <table class="search-tab">
                        <tr>
                        <th style="width:350px;height:50px;font-size:15px;color:red; "></th>
                        <th style="width:80px;height:50px;font-size:15px;color:red; ">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="book_name">书名</option>
                                    <option value="author">作者</option>
                                    <option value="press">出版社</option>
                                    <option value="book_id">图书Id</option>
                                </select>
                            </td>
                        <th style="width:80px;height:50px;font-size:15px;color:red;">搜索关键字:</th>

                            <td style="width:80px;height:50px;font-size:15px;color:red; "><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <th ><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></th>
                        </tr>
                    </table>
                </form>
	<table>
    	<thead>
        	   <tr>
                <th name="id"> 图书ID</th>
                <th name="book_name">书名 </th>
                <th name="picture"> 图片 </th>
                <th style="width:100px; " name="author"> 作者 </th>
                <th name="press">出版社  </th>
                <th name="now_borrow"><a class="borrow">点击借阅</a></th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
            	<td name="id"> <?php echo ($data["id"]); ?></td>
                <td name="book_name"><?php echo ($data["book_name"]); ?> </td>
                <td name="picture"><img src="<?php echo ($data["thumb_picture"]); ?>" alt=""> </td>
                <td name="author"><?php echo ($data["author"]); ?> </td>
                <td name="press"><?php echo ($data["press"]); ?> </td>
                <td name="now_borrow">
                <a  href="/index.php/Home/Book/borrow_book/id/<?php echo ($data["id"]); ?>" id="borrow" >借阅</a>

                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
    <div class="pagin-list">
        <?php echo ($show); ?>
    </div>
    <div class="pxofy">共 <?php echo ($count); ?> 条记录</div>
</div>
<div class="pagination ue-clear"></div>
</body>
<script type="text/javascript" src="/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/Public/Home/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Home/js/jquery.pagination.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})



$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");


showRemind('input[type=text], textarea','placeholder');
</script>
</html>