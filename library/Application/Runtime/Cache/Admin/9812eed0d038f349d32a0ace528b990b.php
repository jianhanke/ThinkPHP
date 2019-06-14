<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />

<title>移动办公自动化系统</title>
</head>
<style type='text/css'>
    .picture{
        width=300px;height=300px;
    }

</style>
<body>
<div class="title"><h2>书籍管理</h2></div>
  <div class="search-wrap">
            <div class="search-content">
                <form action="" method="post" >
                    <table class="search-tab">
                        <tr>
                        <th style="width:350px;height:50px;font-size:15px;color:#0000FF; "></th>
                        <th style="width:80px;height:50px;font-size:15px;color:#0000FF; ">搜索范围:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="book_name">书名</option>
                                    <option value="author">作者</option>
                                    <option value="press">出版社</option>
                                </select>
                            </td>
                        <th style="width:80px;height:50px;font-size:15px;color:#0000FF;">搜索关键字:</th>

                            <td style="width:80px;height:50px;font-size:15px;color:#0000FF; "><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <th ><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
<div class="table-box">
    <table>
        <thead>
            <tr>
                <th class="num">ID</th>
                <th class="name">书名</th>
                <th class="process">图片</th>
                <th class="node">作者</th>
                <th class="time">出版社</th>
                <th>备注</th>
                <th>点击操作</th>

            </tr>
        </thead>

        <tbody>
        
    
            <!-- <foreach name='data' item='dat'> -->
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dat): $mod = ($i % 2 );++$i;?><tr>
                <td class="book_id"><?php echo ($dat["id"]); ?> </td>
                <td class="book_name"><?php echo ($dat["book_name"]); ?>  </td>
                <td  class="file"><img src=<?php echo ($dat["thumb_picture"]); ?>   /></td>
                <td class="author"><?php echo ($dat["author"]); ?> </td>
                <td class="press"><?php echo ($dat["press"]); ?> </td>

                <td class="remark" ><?php echo ($dat["remark"]); ?>  </td>
                <td> <a href= "/index.php/Admin/Manage/modify/id/<?php echo ($dat["id"]); ?>"  style="color:#0000FF;font-size:20px;">修改</a>  </td>
            </tr>
            
           <!--  </endforeach> --><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
    <div class="pagin-list">
        <?php echo ($show); ?>
    </div>
    <div class="pxofy">共 <?php echo ($count); ?> 条记录</div>
</div>

</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
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
$(function(){
    //给确定按钮绑定点击事件
    $('.btn').on('click',function(){
        $('form').submit();
    });


});


// $('.pagination').pagination(100,{
//     callback: function(page){
//         alert(page);    
//     },
//     display_msg: true,
//     setPageNo: true
// });
$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");
showRemind('input[type=text], textarea','placeholder');
</script>


</html>