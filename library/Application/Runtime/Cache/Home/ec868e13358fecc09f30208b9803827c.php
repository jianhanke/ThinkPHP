<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
			a{ text-decoration:none;color:green} 
	</style>
</head>
<body>

	<h2>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;点击,即可阅读</h2>

	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dat): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/Read/get_book/book_id/<?php echo ($dat["story_id"]); ?> "><?php echo ($dat["story_name"]); ?> </a>
		<br /><?php endforeach; endif; else: echo "" ;endif; ?>


</body>
</html>