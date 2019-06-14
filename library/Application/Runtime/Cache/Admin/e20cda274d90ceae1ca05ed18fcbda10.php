<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="/Public/Admin/js/echarts.min.js" ></script>
</head>
<body>
		<div style="width:100%;height:900px;margin:0px;padding: 0px; ">
	<div id="main" style="width: 600px;height:400px;padding: 0px;float: left "></div>
	<div id="circle" style="width:600px;height: 400px;margin:0px;padding: 0px;float: right; "></div>
		</div>

	<p id="man" hidden><?php echo ($data_num[0]); ?></p>
	<p id="women" hidden><?php echo ($data_num[1]); ?> </p>
	<p id="empty_sex" hidden><?php echo ($data_num[2]); ?> </p>

</body>

<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
   		var man=document.getElementById('man').innerText;
   		var women=document.getElementById('women').innerText;
   		var empty_sex=document.getElementById('empty_sex').innerText;

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '用户性别比例柱状图'
            },
            tooltip: {},
            legend: {
                data:['人数']
            },
            xAxis: {
                data: ["男","女","未知"]
            },
            yAxis: {},
            series: [{
                name: '销量',
                type: 'bar',
                data: [man,women,empty_sex]
                

            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
    <script type="text/javascript">
    var circle=echarts.init(document.getElementById('circle'));
    var man=document.getElementById('man').innerText;
   		var women=document.getElementById('women').innerText;
   		var empty_sex=document.getElementById('empty_sex').innerText;

    	option = {
    title : {
        text: '用户性别比例圆形图',
        subtext: '已连通数据库',
        x:'center'
    },
    tooltip : {
        trigger: 'item',
        formatter: "{a} <br/>{b} : {c} ({d}%)"
    },
    legend: {
        orient: 'vertical',
        left: 'left',
        data: ['男','女','未知']
    },
    series : [
        {
            name: '用户性别',
            type: 'pie',
            radius : '55%',
            center: ['50%', '60%'],
            data:[
                {value:man, name:'男'},
                {value:women, name:'女'},
                {value:empty_sex, name:'未知'},
            ],
            itemStyle: {
                emphasis: {
                    shadowBlur: 10,
                    shadowOffsetX: 0,
                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                }
            }
        }
    ]
};
	circle.setOption(option);
    </script>


</html>