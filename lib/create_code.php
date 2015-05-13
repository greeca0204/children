<?php 
	session_start();
	$rand="";
	for($i=0;$i<4;$i++){
		$rand.=dechex(rand(0,15));	
	}
	$_SESSION['code']=$rand;
	$im = imagecreatetruecolor(100,30);
	
	//设置颜色
	$bg = imagecolorallocate($im,0,0,0);//第一次用调色板的时候，背景颜色
	$te = imagecolorallocate($im,255,255,255);
	//线条
	for($i=0;$i<3;$i++){
		$te2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
		imageline($im,rand(0,100),0,100,30,$te2);
	}
	//噪点
	for($i=0;$i<50;$i++){
		imagesetpixel($im,rand()%100,rand()%30,$te2);
	}
	
	//$str="新年好";
	//$str=iconv("GBK","UTF-8","新年好");//确定要绘制的中文文字	
	//imagettftext($im,12,9,20,20,$te,'simhei.ttf',$str);
	
	//把字符串写在图像的左上角
	imagestring($im,6,rand(3,70),rand(0,16),$rand,$te);
	
	//输出图像
	header("COntent-type:image/jpeg");
	imagejpeg($im);
?>