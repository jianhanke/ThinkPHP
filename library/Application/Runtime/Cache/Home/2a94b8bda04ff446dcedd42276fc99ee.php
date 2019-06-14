<?php if (!defined('THINK_PATH')) exit();?>  <!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/library/Public/Home/css/base.css" />
<link rel="stylesheet" type="text/css" href="/library/Public/Home/css/jquery.dialog.css" />
<link rel="stylesheet" href="/library/Public/Home/css/index.css" />
<title>用户界面</title>
</head>

<body>
<div id="container">
  <div id="hd">
    <div class="hd-wrap ue-clear">
      <div class="top-light"></div>
      <h1 class="logo"></h1>
      <div class="login-info ue-clear">
        <div class="welcome ue-clear"><span>用户:</span>
        <a href="javascript:;" class="user-name"><?php echo (session('user_name')); ?></a></div>
        
      </div>
      <div class="toolbar ue-clear"> <a href="javascript:;" class="home-btn">首页</a> 
      <a href="<?php echo U('Home/Login/logout');?> " class="quit-btn exit"></a> </div>
    </div>
  </div>
  <div id="bd">
    <div class="wrap ue-clear">
      <div class="sidebar">
        <h2 class="sidebar-header">
          <p>功能导航</p>
        </h2>
        <ul class="nav">
        

          <li class="office">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>图书业务</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Home/Book/borrow_book');?> ">图书借阅</a></li>
              <li><a href="javascript:;" date-src="<?php echo U('Home/Book/return_book');?> ">图书归还</a></li>
              
              
            </ul>
          </li>
            <li class="nav-info">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>个人业务</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li>
              <a href="javascript:;" date-src="<?php echo U('Home/Person/modify_info');?> ">修改信息</a>
              </li>

              <li><a href="" date-src="<?php echo U('Home/Person/change_pwd');?>">修改密码</a></li>
              

            </ul>
          </li>

          <ul class="nav">
        

          <li class="konwledge">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>在线阅览</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li><a href="javascript:;" date-src="<?php echo U('Home/read/story');?> " >励志故事</a> </li>
              
              
            </ul>

        <li class="email">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>排行榜</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li>
              <a href="javascript:;" date-src="<?php echo U('Home/Rank/book_rank');?> ">被借排名</a>
              </li>
              
              <li>  <a href="javascript:;" date-src="<?php echo U('Home/Rank/press_rank');?> " >出版社排名 </a></li>

            </ul>
          </li>

          <li class="agency">
            <div class="nav-header"><a href="javascript:;" class="ue-clear"><span>留言版</span><i class="icon"></i></a></div>
            <ul class="subnav">
              <li>
              <a href="javascript:;" date-src="<?php echo U('Home/Message/leave_message');?> ">留言</a>
              </li>
              <li>
              <a href="javascript:;" date-src="<?php echo U('Home/Message/show_message');?> ">查看留言</a>
              </li>
              

            </ul>
          </li>

  

        </ul>





      </div>
      
      <div class="content">
        <iframe src="/library/index.php/Home/Index/home" id="iframe" width="100%" height="100%" frameborder="0"></iframe>
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
<script type="text/javascript" src="/library/Public/Home/js/jquery.js"></script>
<script type="text/javascript" src="/library/Public/Home/js/common.js"></script>
<script type="text/javascript" src="/library/Public/Home/js/core.js"></script>
<script type="text/javascript" src="/library/Public/Home/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/library/Public/Home/js/index.js"></script>
</html>