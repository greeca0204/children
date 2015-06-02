<META charset="utf-8">
<?php
	session_start();
	include("lib/conn.php");
	
	$openId = $_SESSION['openId'];
	$nickname = $_SESSION['nickname'];
	$picurl  = @$_POST['pic'];
	$openidstmp = $openId.time();
	$_SESSION['openidstmp'] = $openidstmp;
	
	/*图片上传*/
	$picurl = str_replace('data:image/jpeg;base64,', '', $picurl);
	$picurl = str_replace(' ', '+', $picurl);
	$tmp  = base64_decode($picurl);
	$fileName = time();
	$url = "upload/".$fileName.".jpg";
	$success = file_put_contents($url, $tmp);
	/*写入数据库*/
	if($success){
		$sql="insert into a_motherday(openid,nickname,img,openidstmp) values('$openId','$nickname','$url','$openidstmp')";
		mysql_query($sql);
		echo "<script>location.href='tel.php?fid=".$openidstmp."';</script>";
	}
?>