<?php
	session_start();
	$_SESSION['openId'] = @$_GET['openId'];
	$_SESSION['nickname'] = @$_GET['nickname'];
	$_SESSION['sharestatus'] = 0;
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
	    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	    <link rel="stylesheet" type="text/css" href="css/index.css">
	    <!--滚动 -->
	    <link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" />
	    <script type="text/javascript" src="js/jquery.fullPage.min.js"></script>
	    <script>
			$(function(){
				$('#fullpage').fullpage({
					sectionsColor: ['#f8f8d4', '#f8f8d4', '#f8f8d4', '#f8f8d4']
				});
			});
		</script>
	    <!--滚动 -->
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
	</head>
	
	<body>
	    <div class="container">
	        <div id="fullpage">
	            <div class="section" id="section1">
	            	<div class="word"><img src="images/index/img1_1.jpg" width="100%" /></div>
					<div style="position:absolute;left:0px; bottom:10px; width:100%; text-align:center;-webkit-animation: start 1.5s infinite ease-in-out;"><img src="images/index/web-swipe-tip.png" /></div>
	            </div>
	            <div class="section" id="section2">
	            	<div class="word"><img src="images/index/img2_1.jpg" width="100%" /></div>
					<div style="position:absolute;left:0px; bottom:10px; width:100%; text-align:center;-webkit-animation: start 1.5s infinite ease-in-out;"><img src="images/index/web-swipe-tip.png" /></div>
	            </div>
	            <div class="section" id="section3">
	            	<div class="word"><img src="images/index/img3_1.jpg" width="100%" /></div>
					<div style="position:absolute;left:0px; bottom:10px; width:100%; text-align:center;-webkit-animation: start 1.5s infinite ease-in-out;"><img src="images/index/web-swipe-tip.png" /></div>
	            </div>
	            <div class="section" id="section4">
	            	<div class="word"><img src="images/index/img4_1.jpg" width="100%" /></div>
					<div style="position:absolute;left:0px; bottom:10px; width:100%; text-align:center;-webkit-animation: start 1.5s infinite ease-in-out;"><img src="images/index/web-swipe-tip.png" /></div>
	            </div>
	            <div class="section" id="section5">
	            	<div id="mcover" onclick="document.getElementById('mcover').style.display='';" style="display: none;">
						<img src="images/index/hdgz.jpg" />
					</div>
					<div class="hdgz">
						<p><a href="#" onclick="document.getElementById('mcover').style.display='block';">活动说明</a></p>
					</div>
					<div class="firstpage_btn">
						<a href="uploadPic.php"><img src="images/index/btn_06.jpg" width="251" height="42" /></a>
					</div>
				</div>
	        </div>
	    </div> 
	</body>
</html>
