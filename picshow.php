<?php
	session_start();
	include("lib/conn.php");
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	include("lib/shareToWechatPram.php");//分享到微信参数设置
	
	$openId = $_SESSION['openId'];
	$sql="select * from a_motherday where openid='$openId' order by id desc limit 0,1"; //获取该openid最新一次玩这个游戏的信息
	$conn = mysql_query($sql);
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
		<link rel="stylesheet" type="text/css" href="css/download.css" />
		<SCRIPT>document.documentElement.style.height = window.innerHeight + 'px';</SCRIPT>
		
		<!-- 分享代码开始，由于涉及到PHP调用，不能拆开js-->
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
		<script>
			wx.config({
				debug: false,
				appId: '<?php echo $res['appid'];?>',
				timestamp:'<?php echo $res['timestamp'];?>',
				nonceStr: '<?php echo $res['noncestr'];?>',
				signature: '<?php echo $res['sign'];?>',
				jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage']
			});
			
			var wxDefaultData = {
				"title":"<?php echo $gstwc_title;?>",
				"desc" : "<?php echo $gstwc_desc;?>",
				"link":"<?php echo $gstwc_link;?>",
				"imgUrl":"<?php echo $gstwc_imgUrl;?>",
				"fail": function (res) {alert(JSON.stringify(res));location.reload();}
			}
			
			var wxData1 = {
					"title" : wxDefaultData.title,
					"desc" :  wxDefaultData.desc,	      
					"link" :  wxDefaultData.link,
					"imgUrl" :wxDefaultData.imgUrl,        
					"fail":   wxDefaultData.fail,
					"success": function () {
						if(now==2) toggle(3);
						status = 1;
						updateShareData();
						}
					};
			var wxData2 = {
					"title" : wxDefaultData.title,
					"desc" :  wxDefaultData.desc,	      
					"link" :  wxDefaultData.link,
					"imgUrl" :wxDefaultData.imgUrl,        
					"fail":   wxDefaultData.fail,
					"success": function () {
						if(now==2) toggle(3);
						status = 2;
						updateShareData();
						}
					};
			wx.ready(function () {
				//分享到朋友圈
				wx.onMenuShareTimeline(wxData1);
				//分享给朋友
				wx.onMenuShareAppMessage(wxData2);
			});
			wx.error(function (res) {
			  alert(res.errMsg);
			  location.reload();
			});
		</script>
		<!-- 分享代码开始，由于涉及到PHP调用，不能拆开js-->
	</HEAD>
	<BODY bgcolor="#f6f5b2">
		<div class="warp">
			<div style=" text-align:center; margin:0px auto; width:320px;">
				<?php
					if($rs=mysql_fetch_array(@$conn))
					{
						echo "<img src='".$rs['img']."' width='100%' height='270' />";
						echo "<img src='images/picshow.jpg' width='100%' />";
						if($_SESSION['openId']==$rs['openid']){
							echo "<p style='margin-top:50px;'><a href='tel.php'><img src='images/btn_04.jpg' width='156' height='31' /></a></p>";
						}
					}	
				?>
			</div>
		</div>
	</BODY>
</HTML>