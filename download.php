<?php
	session_start();
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	
	$gstwc_title_proPic = "我的脸萌指数爆灯，你呢？一起PO图赢小蚁运动相机和小米自拍杆。";
	$gstwc_desc_proPic = "我的脸萌指数爆灯，你呢？一起PO图赢小蚁运动相机和小米自拍杆。";
	
	$gstwc_link_proPic = "http://www.laeramus.cn/zt/children/sharetoother.php?fid=".$_SESSION['fid'];
	$gstwc_imgUrl_proPic = "http://www.laeramus.cn/zt/children/images/sharepic/share2.jpg";
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
	<BODY bgcolor="#fff8b0">
		<div id="mcover" onClick="document.getElementById('mcover').style.display='';" style="display: none;">
			<img src="images/download/share1.jpg">
		</div>
		
		<div class="warp">
			<div style="position:absolute;bottom:10px; left:0px; width:100%; text-align:center;">
				<div style="width:100%; text-align:center; margin-bottom:5px;">
					<img src="images/download/success_01.jpg" width="183" height="30" />
				</div>
				<p style="margin-bottom:10px;">
					<a href="http://nb.189.cn/portal/info/getLastClient.do?appId=flow&clientType=1&version=v1.1&ly=189-web">
						<img src="images/download/btn_08.jpg" width="208" height="44" />
					</a>
				</p>
				<?php
					$userAgent = $_SERVER['HTTP_USER_AGENT'];
					if(strpos($userAgent,"iPhone") || strpos($userAgent,"iPad") || strpos($userAgent,"iPod")){
				?>
						<p style="margin-bottom:10px;">
							<a href="http://mp.weixin.qq.com/s?__biz=MzA3NzEzNjMxNg==&mid=217830177&idx=1&sn=67eaef10263ce7dbc1b80944dcc18e3c#rd">
								<img src="images/download/btn_07.jpg" width="208" height="44" />
							</a>
						</p>
				<?php	
					}else if(strpos($userAgent,"Android")){
				?>
						<p style="margin-bottom:10px;">
							<a href="weixin://profile/llb21cn">
								<img src="images/download/btn_07.jpg" width="208" height="44" />
							</a>
						</p>
				<?php					    
					}
				?>
				<p style="margin-bottom:10px;">
					<a href="uploadPic.php">
						<img src="images/download/btn_09.jpg" width="208" height="44" />
					</a>
				</p>
				<p style="margin-top:30px;"><a href="#" onClick="document.getElementById('mcover').style.display='block';">查看流量兑换详情</a></p>
			</div>
		</div>
	</BODY>
</HTML>