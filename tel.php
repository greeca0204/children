<?php 
	session_start(); 	
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	include("lib/shareToWechatPram.php");//分享到微信参数设置
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

		<!-- 浏览器缓存，仅用于测试，发布版本需要删掉 -->
		<!--
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		-->
		<!-- 浏览器缓存，仅用于测试，发布版本需要删掉 -->

		<TITLE><?php echo $gsitetitle;?></TITLE>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="css/tel.css"/>		
		<SCRIPT src="js/tel.js"></SCRIPT>
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
				"title":"<?php echo $gstwc_title_proPic;?>",
				"desc" : "<?php echo $gstwc_desc_proPic;?>",
				"link":"<?php echo $gstwc_link_proPic;?>",
				"imgUrl":"<?php echo $gstwc_imgUrl_proPic;?>",
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
	<BODY>
		<!--分享div -->
		<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: block;">
     		<img src="images/share.jpg">
		</div>
		<!--分享div -->
		
		<div class="warp">
			<div style=" padding-top:220px; text-align:center;">
				<form action="updateTel.php" method="post" onsubmit="return validate();">
					<div style="text-align:center;"><img src="images/tel_02.jpg" width="210px" height="auto" /></div>
					<p style=" padding-top:5px; height:46px; background:url(images/kuang.jpg) no-repeat center 0px; -webkit-background-size: 223px 46px;background-size: 223px 46px;">
						<input id="tel" name="tel" type="text" value="请输入手机号码" style="width:210px; height:35px; border:0px; background-color: transparent; " />
					</p>
					<div style="width:210px; margin:0px auto; text-align:left;"><img src="images/tel_03.jpg" width="70px" height="auto" /></div>
					<div style=" padding:5px 0px 5px 0px; height:32px;width:210px; margin:0px auto;">
						<div style="width:90px; float:left; margin-right:20px; background:url(images/kuang2.jpg) no-repeat center 0px;-webkit-background-size: 90px 32px;background-size: 90px 32px;">
							<input type="text" name="code" style="width:90px; height:32px; border:0px; background-color: transparent; " />
						</div>
						<div style=" width:100px; float:left;">
							<img id="code" src="lib/create_code.php" style="cursor: pointer; vertical-align:middle;" />
						</div>
						<div class="cl"></div>
					</div>
					<p>
						<input type="image" src="images/btn_05.jpg" name="submit"  width="208" height="43" />
					</p>	
				</form>
			</div>
		</div>
		
	</BODY>
</HTML>