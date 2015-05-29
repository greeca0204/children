<?php
	session_start();
	include("lib/globalPram.php");//系统全局参数
	$pic = @$_POST['pic'];
	$openId = @$_SESSION['openId'];
	$nickname = @$_SESSION['nickname'];
	$_SESSION['sharestatus'] = 0;
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
	    <meta content="telephone=no" name="format-detection" />
	    <meta name="keywords" content="<?php echo $gkeywords;?>">
		<meta name="description" content="<?php echo $description;?>">
	    <title><?php echo $gsitetitle;?></title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/uploadPicView.css" />
		<SCRIPT>document.documentElement.style.height = window.innerHeight + 'px';</SCRIPT>
	</HEAD>
	<BODY style=" height:100%; background:url('images/uploadpicbg/bg.jpg') repeat-y;">
		<div class="warp">
			<img src="<?php echo $pic ?>" /><br />
			<img src="images/uploadpicbg/uploadPicView2.jpg" width="100%" height="auto" />
			<form action='upload.php' method='post'>
				<input id='pic' name='pic' type='hidden' value='<?php echo $pic; ?>' />
				<div style="width:90%; margin:0px auto;">
					<div style="margin-top:30px; float:left;">
						<img src="images/uploadpicbg/btn_02.jpg" name="back" onClick="location.href='http://www.laeramus.cn/zt/children/uploadPic.php';"  width="107" height="33" />
					</div>
					<div style="margin-top:30px; float:right;">
						<input type="image" src="images/uploadpicbg/btn_03.jpg" name="submit"  width="107" height="33" />
					</div>
					<div class="cl"></div>
				</div>
			</form>
		</div>
	</BODY>
</HTML>