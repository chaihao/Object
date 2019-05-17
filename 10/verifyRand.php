<?php

// 生成随机验证图片

$string = "abcdefghijklmnlopqrstuvwxyz0123456789";
$str = '';
for ($i = 0; $i < 6; $i++) {
    $num = rand(0,strlen($string));
    $str .= substr($string,$num,1);
}
// 生成字符串，存入session
session_start();
$_SESSION['number'] = $str;

// 创建背景图片
$img = imagecreatetruecolor(80, 20);
// 图片背景色
$back_color = imagecolorallocate($img, 255, 255, 255);
// 文本色
$text_color = imagecolorallocate($img, 0, 0, 0);

// 加入干扰线
for ($i=0; $i < 3; $i++) { 
	$line = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
	imageline($img, rand(0,15), rand(0,15), rand(100,150), rand(10,50), $line);
}
// 增加干扰像素
for ($i=0; $i < 200 ; $i++) { 
	$picel = imagecolorallocate($img,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($img, rand()%100, rand()%50, $picel);
}


imagefill($img, 0, 0, $back_color);
imagestring($img, 28, 10, 0, $str, $text_color);

// 清空输出缓存
ob_clean();
header("Content-type:image/png");
imagepng($img);

?>

