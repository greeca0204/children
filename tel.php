<?php 
	session_start(); 	
	include("lib/globalPram.php");//系统全局参数
	include("lib/share.php");//分享接口实现
	if(@$_GET['fid'])
	{
		$_SESSION['fid'] = $_GET['fid'];
	}
	else
	{
		$_SESSION['fid'] = $_GET['fid'];
	}
	
		
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
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<!--电话-->
		<link rel="stylesheet" type="text/css" href="css/tel.css"/>		
		<SCRIPT src="js/tel.js"></SCRIPT>
		<!--电话-->
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
		<script type="text/javascript">
			$(function(){	
				//数字+字母验证
				$("#code").click(function(){
					$(this).attr("src",'lib/create_code.php?' + Math.random());
				});
			});
		</script>
	</HEAD>
	<BODY bgcolor="#fff8b0">
		<!--分享div -->
			<?php 
				if(@$_SESSION['sharestatus']==0){
			?>
					<div id="mcover" onClick="document.getElementById('mcover').style.display='';" style="display: block;">
						<img src="images/tel/share.jpg">
					</div>
			<?php
					$_SESSION['sharestatus'] = 1;
				}
				else{
			?>
					<div id="mcover" onClick="document.getElementById('mcover').style.display='';" style="display: none;">
						<img src="images/tel/share.jpg">
					</div>
			<?php
				}
			?>
		<!--分享div -->
		
		<div class="warp">
			<div style="  position:absolute; width:100%; top:45%;  left:0px; text-align:center;">
				<form action="updateTel.php" method="post" onSubmit="return validate();">
					<div style="text-align:center;"><img src="images/tel/tel_02.jpg" width="210px" height="auto" /></div>
					<p style=" padding-top:5px; height:46px; background:url(images/tel/kuang.jpg) no-repeat center 0px; -webkit-background-size: 223px 46px;background-size: 223px 46px;">
						<input id="tel" name="tel" type="text" value="请输入手机号码" style="width:210px; height:35px; border:0px; background-color: transparent; " onFocus="clearTel();" />
					</p>
					<div style="width:210px; margin:0px auto; text-align:left;"><img src="images/tel/tel_03.jpg" width="70px" height="auto" /></div>
					<div style=" padding:5px 0px 5px 0px; height:32px;width:210px; margin:0px auto;">
						<div style="width:90px; float:left; margin-right:20px; background:url(images/tel/kuang2.jpg) no-repeat center 0px;-webkit-background-size: 90px 32px;background-size: 90px 32px;">
							<input type="text" name="code" style="width:90px; height:32px; border:0px; background-color: transparent; " />
						</div>
						<div style=" width:100px; float:left;">
							<img id="code" src="lib/create_code.php" title="看不清，换一个" style="cursor: pointer; vertical-align:middle;" />
						</div>
						<div class="cl"></div>
					</div>
					<p>
						<input type="image" src="images/tel/btn_05.jpg" name="submit"  width="208" height="43" />
					</p>	
				</form>
			</div>
		</div>
		
	</BODY>
</HTML>