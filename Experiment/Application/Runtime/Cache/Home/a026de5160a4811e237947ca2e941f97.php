<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<style>
		html, body {
            width:100%;
            height:100%;
            margin:0px;
            padding:0px;
        }
		a{ text-decoration:none} 
</style>

<body>
	

	<div style="width: 50%;  border:5px;  "  >
	<?php if(is_array($datas)): $i = 0; $__LIST__ = $datas;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Course/joinChapterById');?>/id/<?php echo ($data['id']); ?>"  target="block"> &#9733<?php echo ($data['name']); ?> </a> <br /><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>

</body>
</html>