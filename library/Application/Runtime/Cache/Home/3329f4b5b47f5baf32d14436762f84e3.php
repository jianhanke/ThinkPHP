<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="/Public/Admin/js/echarts.min.js"></script>
	<title>Document</title>
</head>
<body>
		<div  id="main" style="width:100%;height:580px; " ></div>
        <p hidden id="nums" ><?php echo ($count); ?> </p>

		<?php if(is_array($data)): foreach($data as $k=>$dat): ?><p  id="<?php echo ($k); ?>" nums="<?php echo ($dat[0]['num']); ?>" hidden ><?php echo ($dat[0]['book_name']); ?>	</p><?php endforeach; endif; ?>


    

</body>
<script type="text/javascript">
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
    title: {
        text: '被借排行榜',
        subtext: '数据连同数据库,实时更新'
    },
    tooltip: {
        trigger: 'axis',
        axisPointer: {
            type: 'shadow'
        }
    },
    
    grid: {
        left: '3%',
        right: '4%',
        bottom: '3%',
        containLabel: true
    },
    xAxis: {
        type: 'value',
        boundaryGap: [0, 0.01]
    },
    yAxis: {
        type: 'category',
        data: arr_name
    },
    series: [
        {
            name: '2011年',
            type: 'bar',
            data: arr_nums
        },
      
    ]
};
	main.setOption(option);


</script>

</html>