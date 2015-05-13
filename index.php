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
		<META name="format-detection" content="telephone=no">
		<META name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<META name="apple-mobile-web-app-capable" content="yes">
		<META name="apple-mobile-web-app-status-bar-style" content="black">
		<TITLE>流量宝母亲节活动</TITLE>
		<link rel="stylesheet" type="text/css" href="css/mother.css"/>
		<link rel="stylesheet" type="text/css" href="css/thickbox.css"/>
		<SCRIPT src="js/jquery-1.2.6.pack.js"></script>	
		<SCRIPT>document.documentElement.style.height = window.innerHeight + 'px';</SCRIPT>
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
	</HEAD>
	<BODY>
		<DIV class="pages">
			<!-- 滚动页 -->
			<DIV class="page p1">
				<DIV class="content">
					<DIV class="sub-page sp1" style=" background: url(images/mother_01.jpg) no-repeat center 0px;-webkit-background-size: 100% auto;background-size: 100% auto;">
						<DIV class="arrow">			
							<SPAN class="icon-down">下一页</SPAN>
						</DIV>
					</DIV>
					<DIV class="sub-page sp1" style=" background: url(images/mother_02.jpg) no-repeat center 0px;-webkit-background-size: 100% auto;background-size: 100% auto;">
						<DIV class="arrow">
							<SPAN class="icon-down">下一页</SPAN>
						</DIV>
					</DIV>
					<DIV class="sub-page sp1" style=" background: url(images/mother_03.jpg) no-repeat center 0px;-webkit-background-size: 100% auto;background-size: 100% auto;">
						<DIV class="arrow">
							<SPAN class="icon-down">下一页</SPAN>
						</DIV>
					</DIV>
					<DIV class="sub-page sp1" style=" background: url(images/mother_04.jpg) no-repeat center 0px;-webkit-background-size: 100% auto;background-size: 100% auto;">
						<DIV class="arrow">
							<SPAN class="icon-down">下一页</SPAN>
						</DIV>
					</DIV>				
					<DIV class="sub-page sp3">
						<a href="index.php#pic" name="pic"></a>
						<div class="upgrate_btn">
							<INPUT id="file" class="real-btn" type="file">
							<BUTTON class="btn-take-photo">&nbsp;</BUTTON>
						</div>
						<div style="position:absolute; top:350px; left:0px; width:100%; height:84px; margin:10px 0px 10px 0px; text-align:center;"><img src="images/pic2_01.jpg" width="210" height="84" /></div>
					</DIV>
				</DIV>
				<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: none;">
					<img src="images/hdgz.jpg" />
				</div>
			</DIV>
			<!-- 滚动页 -->
			<!-- 拍照页 -->
			<DIV class="page p2" style="background:#fffbb2;">
				<div style="text-align:center; margin-bottom:5px; "><img src="images/choicemother.jpg" width="100%" /></div>
				<NAV class="sub-nav">
					<UL>
						<LI class="btn-back"><input type="image" src="images/btn_02.jpg" name="back"  width="107" height="27" /></LI>
						<LI class="btn-save"><input type="image" src="images/btn_01.jpg" name="submit"  width="107" height="27" /></LI>
					</UL>
				</NAV>
				<DIV class="content">
					<DIV id="container" class="editor"></DIV>

					<DIV class="tools">
						<UL class="list-role">
							<LI data-fg='{ "src": "images/template_01_top.jpg",  "pos": [0, 0], "move": false }' data-fg2='{ "src": "images/template_01_right.jpg",  "pos": [224,40], "move": false }'  data-fg3='{ "src": "images/template_01_bottom.jpg",  "pos": [0,209], "move": false }'  data-fg4='{ "src": "images/template_01_left.jpg",  "pos": [0, 40], "move": false }' >
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/template_01.jpg" /></DIV>
									<p>慈母</p>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/template_02_top.jpg",  "pos": [0, 0], "move": false }' data-fg2='{ "src": "images/template_02_right.jpg",  "pos": [224,40], "move": false }'  data-fg3='{ "src": "images/template_02_bottom.jpg",  "pos": [0,209], "move": false }'  data-fg4='{ "src": "images/template_02_left.jpg",  "pos": [0, 40], "move": false }'>
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/template_02.jpg" /></DIV>
									<p>女超人</p>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/template_03_top.jpg",  "pos": [0, 0], "move": false }' data-fg2='{ "src": "images/template_03_right.jpg",  "pos": [224,40], "move": false }'  data-fg3='{ "src": "images/template_03_bottom.jpg",  "pos": [0,209], "move": false }'  data-fg4='{ "src": "images/template_03_left.jpg",  "pos": [0, 40], "move": false }'>
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/template_03.jpg" /></DIV>
									<p>潮妈</p>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/template_04_top.jpg",  "pos": [0, 0], "move": false }' data-fg2='{ "src": "images/template_04_right.jpg",  "pos": [224,40], "move": false }'  data-fg3='{ "src": "images/template_04_bottom.jpg",  "pos": [0,209], "move": false }'  data-fg4='{ "src": "images/template_04_left.jpg",  "pos": [0, 40], "move": false }'>
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/template_04.jpg" /></DIV>
									<p>虎妈</p>
								</div>
							</LI>
						</UL>
						<DIV class="hint">照片合成中……</DIV>
					</DIV>	
				</DIV>
				
			</DIV>
			<!-- 拍照页 -->
		</DIV>
		<SCRIPT src="js/mother_01.js"></SCRIPT>
		<SCRIPT src="js/ping_tcss_ied.js"></SCRIPT>	
		<SCRIPT>if(typeof(pgvMain) == 'function') pgvMain();</SCRIPT>
		<SCRIPT src="js/all.js"></SCRIPT>		
		<SCRIPT src="js/mother_02.js"></SCRIPT>
		<SCRIPT src="js/mother_03.js"></SCRIPT>
		<SCRIPT src="js/mother_04.js"></SCRIPT>
	</BODY>
</HTML>