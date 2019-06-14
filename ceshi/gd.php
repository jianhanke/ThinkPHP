<?php 

// $img=imagecreatetruecolor(1000,1000);

// $white=imagecolorallocate($img,255,255,255);
// $red=imagecolorallocate($img,255,0,0);

// imagefill($img,0,0,$white);
// imageellipse($img,500,500,500,90,$red);  //宽高

// header('Content-type:image/png');
// imagepng($img);
// 
// 

// $img=imagecreateFrompng('./ceshi.png');
// $color=imagecolorallocate($img,223,230,221);
// imagefill($img,0,0,$color);

// imagepng($img,'./ceshi2.png',8);   //输出png格式的普图像,

// imagedestroy($img);

$source='./ceshi.png';
$target='./ceshi3.png';

list($src_w,$src_h)=getimagesize($source);

$src_img=imagecreatefrompng($source);
$dst_img=imagecreatefrompng($target);

imagecopyresampled($dst_img,$src_img,0,0,0,0,$src_w,$src_h,$src_w,$src_h);
header('Content-Type:image/png');
imagepng($dst_img);
