<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>	

	

	<p>/Experiment/Public</p>

	<input type="hidden"  id='hiddenUrl' value="ws://localhost:6080/websockify?token=host10"  >

  <div id="screen" >
    
  </div>


	
</body>

<script type="module" crossorigin="anonymous" >
	
	import RFB from '/Experiment/Public/noVNC/core/rfb.js';
	console.log("jianhanke!");
	var url=document.getElementById("hiddenUrl").value;
	console.log(url);
	 var rfb = new RFB(document.getElementById('screen'),'ws://localhost:6080/websockify?token=host10',{ credentials: { password: '123456' } });
	rfb.connect();
	console.log("Hello Runoob!");
	// console.log(rfb);
	// rfb.connect();

</script>

<script type="text/javascript">
	var url=document.getElementById("hiddenUrl").innerHTML;
	console.log(url);


</script>


</html>