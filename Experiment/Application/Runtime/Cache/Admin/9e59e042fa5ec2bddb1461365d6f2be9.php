<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>后台管理</title>
	<link rel="stylesheet" type="text/css" href="/Experiment/Public/admin/css/admin_login.css"/>
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="/Experiment/index.php/Admin/Login/login" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="Aid" value="" id="user" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="Apwd" value="" id="pwd" size="40" class="admin_input_style" />
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" autofocus="autofocus"/>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </div>
</body>
<script>
    window.onload = function() {
  document.getElementById("user").focus();
}
</script>
</html>