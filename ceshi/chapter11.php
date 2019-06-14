<?php 

$filename='./123.txt';
$content='测试测试';

header('Content-Type:text/html;charset=UTF-8');

echo file_get_contents($filename);
echo $content;

$content=iconv('GBK','UTF-8',$content);   //将左边的转化为右边的
file_put_contents('./test.txt',$content);

$filename2=strtr("C:/Windows/System32/drivers/etc/hosts",'/','\\');
echo $filename2.'<br />';
echo file_get_contents($filename2);


echo  "jlljl'$content'";