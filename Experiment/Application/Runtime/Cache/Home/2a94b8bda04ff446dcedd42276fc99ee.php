<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>数据实验平台</title>
</head>

<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
<body>
  <ul>
    <li><a href="<?php echo U('home');?>" target="iframe" >首页     </a></li>
    <!-- <li><a class="active"  href="<?php echo U('showCourse');?>" target="iframe">课程 </a></li> -->
    <li><a href="<?php echo U('showExperiment');?>" target="iframe" >主机</a></li>
    <li><a href="<?php echo U('showCourse');?>" target="iframe" >课程</a></li>
    <li><a href="<?php echo U('showMyCourse');?>" target="iframe">我的课程</a></li>
   <li><a href="<?php echo U('showStudentInfoById');?> " target="iframe">个人中心</a></li>
    <li><a href="">用户:<?php echo ($user_name); ?> </a>  </li>
  </ul>

   <div id="myIframe" >
        <iframe src="/Experiment/index.php/Home/Index/home" name="iframe" scrolling="" width="100%" height="650px;" frameborder="0"></iframe>
    </div>
  
</body>
</html>