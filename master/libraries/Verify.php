<?php
session_start();
$length	= 4;
$type	= 'png';
$width	= 48;
$height	= 22;

$chars = str_shuffle('123456789123456789');
$randval = substr($chars,0,4);

$_SESSION['Verify'] = md5(strtolower($randval));

$width = ($length*10+10)>$width ? $length*10+10 : $width;
if ( $type!='gif' && function_exists('imagecreatetruecolor')) {
	$im = @imagecreatetruecolor($width,$height);
}else {
	$im = @imagecreate($width,$height);
}
$r = Array(225,255,255,223);
$g = Array(225,236,237,255);
$b = Array(225,236,166,125);
$key = mt_rand(0,3);

$backColor = imagecolorallocate($im, 234, 246, 252);	//背景色（随机）
$borderColor = imagecolorallocate($im, 1000, 1000, 1000);	//边框色
$pointColor = imagecolorallocate($im,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));	//点颜色

@imagefilledrectangle($im, 0, 0, $width - 1, $height - 1, $backColor);
@imagerectangle($im, 0, 0, $width-1, $height-1, $borderColor);
$stringColor = imagecolorallocate($im,mt_rand(0,200),mt_rand(0,120),mt_rand(0,120));



//写入字符
for($i=0;$i<$length;$i++) {
	imagestring($im,5,$i*10+5,mt_rand(1,8),$randval{$i}, $stringColor);
}

//显示图像
header("Content-type: image/".$type);
$ImageFun='image'.$type;
$ImageFun($im);
imagedestroy($im);
?>