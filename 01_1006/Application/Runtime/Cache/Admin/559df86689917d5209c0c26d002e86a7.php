<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	变量a=<?php echo ($a); ?> ,变量b=<?php echo ($b); ?> <br>
	a+b=<?php echo ($a+$b); ?> <br>
	a-b=<?php echo ($a-$b); ?>  <br>
	a*b=<?php echo ($a*$b); ?> <br>
	a/b=<?php echo ($a/$b); ?> <br>
	a++=<?php echo ($a++); ?>  ++a=<?php echo ++$a;?> <br>
	b--=<?php echo ($b--); ?> --b=<?php echo --$b;?>
</body>
</html>