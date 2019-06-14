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
<div class="title"><h2>留言板</h2></div>

<div class="table-box">
	<table>
    	<thead>
        	<tr>
                <th class="num">是否匿名</th>
            	<th class="num" >  留言人</th>
                <th class="name">留言内容</th>
                <th class="process">留言日期</th>
                <th class="num"  >点击删除</th>
                <th class="name">点击置顶</th>
            </tr>
        </thead>
           
        <tr> 
            <td style="color:blue"> <p style="float:right">【置顶】</p><?php echo ($tops['user_status']==11? '实名' : '匿名'); ?> </td>
            <td style="color:blue"> <?php echo ($tops['user_name']); ?>   </td>
            <td style="color:blue"><?php echo ($tops['user_message']); ?> </td>
            <td style="color:blue"><?php echo ($tops['add_date']); ?> </td>  
        </tr>   
        <tbody>
              
            

            <?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
            	<td class="user_name" style="color: red;float: center"><?php echo ($data['user_status']==1? '实名' : '匿名'); ?> </td>
                <td> <?php echo ($data['user_name']); ?> </td>
                <td style="height: 50px;"> <?php echo ($data['user_message']); ?>   </td>
                <td class="date" ><?php echo ($data['add_date']); ?> </td>
                <td>   <a href="/index.php/Admin/Message/deleteById/message_id/<?php echo ($data['message_id']); ?> " style="color:red">删除</a> </td>
                <td>      <a href="/index.php/Admin/Message/topById/message_id/<?php echo ($data['message_id']); ?>  " style="color:blue">置顶</a> </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>

    </table>
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