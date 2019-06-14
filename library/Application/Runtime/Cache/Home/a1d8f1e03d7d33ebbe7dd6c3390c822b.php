<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/Public/Admin/js/echarts.min.js"></script>
</head>
<body>
	
	

	<?php if(is_array($data)): foreach($data as $k=>$dat): ?><p id="<?php echo ($k); ?>" nums="<?php echo ($dat['num']); ?> "hidden ><?php echo ($dat['press_name']); ?>	</p><?php endforeach; endif; ?>
	
	<p id="nums" hidden><?php echo ($nums); ?> </p>
	<div id="main" style="width:170%;height:570px;float:left; "  ></div>
	
</body>
	<script>
		var main=echarts.init(document.getElementById('main'));
		var nums=document.getElementById('nums').innerText;
		
		var arr_name=new Array();
		var arr_nums=new Array();
		for(var i=0;i<nums;i++){
			
			var name=document.getElementById(i).innerText;
			arr_name[i]=name
			

			var number=document.getElementById(i).getAttribute('nums');
			arr_nums[i]=number;
			
		}
		console.log(arr_nums);
		console.log(arr_name);
	

option = {
    xAxis: {
        type: 'category',
        data: arr_name
    },
    yAxis: {
        type: 'value'
    },
    series: [{
        data: arr_nums,
        type: 'line',
        symbol: 'triangle',
        symbolSize: 20,
        lineStyle: {
            normal: {
                color: 'green',
                width: 4,
                type: 'dashed'
            }
        },
        itemStyle: {
            normal: {
                borderWidth: 3,
                borderColor: 'yellow',
                color: 'blue'
            }
        }
    }]
};
main.setOption(option);


	</script>

</html>