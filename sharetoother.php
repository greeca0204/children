<?php
	session_start();
	include("lib/conn.php");
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	include("lib/shareToWechatPram.php");//分享到微信参数设置
	
	$fid = $_GET['fid'];
	$sql="select * from a_motherday where openid='$fid' order by id desc limit 0,1"; //获取该openid最新一次玩这个游戏的信息
	$conn = mysql_query($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
	<HEAD>
		<META charset="utf-8">
		<meta name="keywords" content="<?php echo $gkeywords;?>">
		<meta name="description" content="<?php echo $description;?>">
		<META name="format-detection" content="telephone=no">
		<META name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<META name="apple-mobile-web-app-capable" content="yes">
		<META name="apple-mobile-web-app-status-bar-style" content="black">
	    <title><?php echo $gsitetitle;?></title>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<style type="text/css">
		body{background-color: #fffbb2;}
		.warp{background-color: #fffbb2;}
		</style>
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
			<?php
				if($rs=mysql_fetch_array(@$conn))
				{
					echo "<img src='".$rs['img']."' width='100%' height='270' />";
				}	
			?>
			<div style="width:100%; text-align:center;">
				<img src="images/picshow.jpg" width="320" height="87" />
			</div>
			<div style="width:100%; text-align:center; margin-top:5px;">
				<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5ce0cf9472acf4b6&redirect_uri=http%3a%2f%2fnb.189.cn%2fpublic%2fwbWeixinCallback.do&response_type=code&scope=snsapi_base&state=http%3a%2f%2fwww.laeramus.cn%2fzt%2fchildren%2findex.php&connect_redirect=1#wechat_redirect">
					<img src="images/btn_04.jpg" width="170" height="33" />
				</a>
			</div>
		</div>
		
	</BODY>
</HTML>