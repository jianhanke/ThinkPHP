<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" type="/Public/Admin/text/css" href="/Public/Admin/css/jquery.dialog.css" />
<link rel="stylesheet" href="/Public/Admin/css/index.css" />
<title>图书后台管理系统</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear"><span>管理员:</span><a  class="user-name"><?php echo (session('admin_name')); ?> </a></div>
        <!-- <div class="login-msg ue-clear"> <a href="javascript:;" class="msg-txt">消息</a> <a href="javascript:;" class="msg-num">10</a> </div> -->
      </div>
      <div class="toolbar ue-clear">
       <a href="javascript:;" class="home-btn">首页</a>
       <a href="/index.php/Admin/Index/logout" class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
         <!--  <li class="office current">
            <div class="nav-header"><a href="javascript:;" date-src="home.html" class="ue-clear"><span>日常办公</span><i class="icon"></i></a></div>
          </li>
          <li class="gongwen">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>公文起草</span><i class="icon"></i></a></div>
          </li> -->
          <li class="nav-info">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>图书管理</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Manage/showList');?> ">查看书籍</a></li>
              <li><a href="" date-src="<?php echo U('Admin/Manage/add');?> ">添加图书</a></li>
              <li><a href="" date-src="<?php echo U('Admin/Manage/haved_borrow');?> ">借阅查询</a></li>
              <li><a href="" date-src="<?php echo U('Admin/Manage/no_borrow');?> ">现有书籍</a></li>

            </ul>
          </li>


          <li class="konwledge">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>用户管理</span><i class="icon"></i></a></div>
          <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/User/showList');?> ">用户列表</a></li>
              <li><a href="" date-src="<?php echo U('Admin/User/add');?> ">添加用户 </a></li>
            
          </ul>
              
          </li>
          <li class="agency">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>图书记录</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Record/circulate_record');?> ">流通记录</a></li>
              
            
          </ul>


          </li>
          <li class="email">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>数据库管理</span><i class="icon"></i></a></div>
          <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Excel/excel');?> ">
                数据库导出Excel
              </a></li>
              
            
          </ul>
    


          </li>
              <li class="gongwen">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>数据统计</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Statistics/sex');?> ">用户统计</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Statistics/books');?> ">书本统计</a></li>
            
          </ul>

          </li> 
      

          <li class="system">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>留言管理</span><i class="icon"></i></a></div>
              <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Admin/Message/message_manage');?> ">留言处理</a></li>
              
            
          </ul>

          </li>
        </ul>

      </div>
      <div class="content">
        <iframe src="home.html" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
  <div id="ft" class="ue-clear">
    <div class="ft-left"> <span>中国移动</span> <em>Office&nbsp;System</em> </div>
    <div class="ft-right"> <span>Automation</span> <em>V2.0&nbsp;2014</em> </div>
  </div>
</div>
<div class="exitDialog">
  <div class="dialog-content">
    <div class="ui-dialog-icon"></div>
    <div class="ui-dialog-text">
      <p class="dialog-content">你确定要退出系统？</p>
      <p class="tips">如果是请点击“确定”，否则点“取消”</p>
      <div class="buttons">
        <input type="button" class="button long2 ok" value="确定" />
        <input type="button" class="button long2 normal" value="取消" />
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/core.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/Public/Admin/js/index.js"></script>
</html>