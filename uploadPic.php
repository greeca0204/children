<?php
	session_start();
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	include("lib/shareToWechatPram.php");//分享到微信参数设置
	
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
		<link rel="stylesheet" type="text/css" href="css/children.css"/>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<!--微信接口调用 -->
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
		<!--微信接口调用 -->
		<style type="text/css">
			html, body { height: 100%; width: 100%; }
			canvas { display: block; } 
		</style>
		
	</head>
	<BODY bgcolor="#f6f5b2">
		<DIV class="pages">
			<!-- 滚动页 -->
			<DIV class="page p1">
			
				<DIV class="content">			
					<DIV class="sub-page sp3">
						<div class="upgrate_btn">
							<div class="cent">
								<INPUT id="file" class="real-btn" type="file" />
								<BUTTON class="btn-take-photo">&nbsp;</BUTTON>
							</div>
						</div>
					</DIV>
				</DIV>
			</DIV>
			<!-- 滚动页 -->
			<!-- 拍照页 -->
			<DIV class="page p2" style=" height:100%; background:url('images/uploadpicbg/bg.jpg') repeat-y;">
				
				<DIV class="content">
					<DIV id="container" class="editor"></DIV>
					<DIV class="tools">
						<UL class="list-role">
							<LI data-fg='{ "src": "images/uploadpicbg/template_01_top.png",  "pos": [68, 0], "move": false }' data-fg2='{ "src": "images/uploadpicbg/template_01_right.png",  "pos": [279,58], "move": false }'  data-fg3='{ "src": "images/uploadpicbg/template_01_bottom.png",  "pos": [68,212], "move": false }'  data-fg4='{ "src": "images/uploadpicbg/template_01_left.png",  "pos": [0, 0], "move": false }' data-fg5='{ "src": "images/uploadpicbg/template_01_1.png",  "pos": [100, 100], "move": true }' >
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/uploadpicbg/template_01.jpg" /></DIV>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/uploadpicbg/template_02_top.png",  "pos": [37, 0], "move": false }' data-fg2='{ "src": "images/uploadpicbg/template_02_right.png",  "pos": [288,59], "move": false }'  data-fg3='{ "src": "images/uploadpicbg/template_02_bottom.png",  "pos": [37,232], "move": false }'  data-fg4='{ "src": "images/uploadpicbg/template_02_left.png",  "pos": [0, 0], "move": false }' data-fg5='{ "src": "images/uploadpicbg/template_02_1.png",  "pos": [100, 100], "move": true }'>
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/uploadpicbg/template_02.jpg" /></DIV>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/uploadpicbg/template_03_top.png",  "pos": [116, 0], "move": false }' data-fg2='{ "src": "images/uploadpicbg/template_03_right.png",  "pos": [303,67], "move": false }'  data-fg3='{ "src": "images/uploadpicbg/template_03_bottom.png",  "pos": [116,210], "move": false }'  data-fg4='{ "src": "images/uploadpicbg/template_03_left.png",  "pos": [0, 0], "move": false }' data-fg5='{ "src": "images/uploadpicbg/template_03_1.png",  "pos": [100, 100], "move": true }'>
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/uploadpicbg/template_03.jpg" /></DIV>
								</div>
							</LI>
							<LI data-fg='{ "src": "images/uploadpicbg/template_04_top.png",  "pos": [0, 0], "move": false }' data-fg2='{ "src": "images/uploadpicbg/template_04_right.png",  "pos": [302,59], "move": false }'  data-fg3='{ "src": "images/uploadpicbg/template_04_bottom.png",  "pos": [24,195], "move": false }'  data-fg4='{ "src": "images/uploadpicbg/template_04_left.png",  "pos": [0, 59], "move": false }' data-fg5='{ "src": "images/uploadpicbg/template_04_2.png",  "pos": [100, 100], "move": true }' >
								<div class="thumbli">
									<DIV class="thumb"><IMG alt="" src="images/uploadpicbg/template_04.jpg" /></DIV>
								</div>
							</LI>
						</UL>
						<DIV class="hint">照片合成中……</DIV>
					</DIV>	
				</DIV>
				<div style="width:90%; margin:0px auto;">
					<NAV class="sub-nav">
						<UL>
							<LI class="btn-back" style="text-align:left;"><input type="image" src="images/uploadpicbg/btn_02.jpg" name="back"  width="107" height="33" /></LI>
							<LI class="btn-save" style="text-align:right;"><input type="image" src="images/uploadpicbg/btn_01.jpg" name="submit"  width="107" height="33" /></LI>
						</UL>
					</NAV>	
				</div>		
			</DIV>
			<!-- 拍照页 -->
		</DIV>
		<SCRIPT src="js/children_01.js"></SCRIPT>
		<SCRIPT src="js/all.js"></SCRIPT>		
		<SCRIPT src="js/children_02.js"></SCRIPT>
		<SCRIPT src="js/children_03.js"></SCRIPT>
		<SCRIPT src="js/children_04.js"></SCRIPT>
	</BODY>
</html>