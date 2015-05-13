<META charset="utf-8">
<?php
	session_start();
	include("lib/conn.php");
	include("lib/Random.php");
	
	/*获取页面所需信息*/
	$openId = $_SESSION['openId'];  //使用者的openid
	$code = $_SESSION['code'];  //验证码
	$mobile = $_POST['tel']; //电话号码
	
	$clientId = '8013413301';	//appid,需要向流量宝申请，更换活动时需要修改
	$taskId = '100001933';   //活动id,需要向流量宝申请，更换活动时需要修改
	$key = 'uUWeehMg5or7TCkVJVIHlGGeoYOJ5jh1';   //活动key,需要向流量宝申请，更换活动时需要修改
	$clientType = 1; //连接客户端状态，1为pc客户端，因为调用的多数是服务器，故默认为1
	$timeStamps = time(); //当前系统时间戳
	$uuid = getTimestamp(13).randomkeys(5); //uuid由13位时间戳和5位随机数组成
	$version = 'v1.5'; //版本号
	
	/*检测验证码*/
	if($_POST['code'] != $code){
		echo "<script>alert('验证码错误！');location.href='tel.php';</script>";
	}	
	
	/*检测该电话号码是否已经兑券*/
	$sqlIsExist = "select count(*) from a_motherday where tel='$mobile'";
	$rsIsExist = mysql_query($sqlIsExist);
	$arrIsExist = mysql_fetch_array($rsIsExist);
	
	if($arrIsExist[0] >= 1){
		echo "<script>alert('此手机号码已经兑取流量券！请重新输入手机号码！');location.href='tel.php';</script>";
	}
	
	/*要完成接口调用，需要做以下操作：*/
	/*1、将字段根据升序顺序进行排序，放入数组中*/
	$requestData = array(
		'clientId'=>$clientId,
		'clientType'=>$clientType,
		'mobile'=>$mobile,
		'taskId'=>$taskId,
		'timeStamp'=>$timeStamps,
		'uuid'=>$uuid,
		'version'=>$version
	);	
	
	/*2、将字段根据升序顺序进行排序，将它的值连接成一个字符串*/
	$data = $clientId.$clientType.$mobile.$taskId.$timeStamps.$uuid.$version;
	
	/*3、使用sha1算法将拼成的字符串与key进行加密，生成签名*/
	$sign = hash_hmac('sha1', $data, $key);    
	
	/*4、将参数逐次传入，使用PHP方法模拟POST提交，php.ini需要开启curl，提交后，流量宝平台返回一个json*/
	$post_data = array();
	$post_data['clientId'] = $clientId;
	$post_data['clientType'] = $clientType;
	$post_data['mobile'] = $mobile;
	$post_data['taskId'] = $taskId;
	$post_data['timeStamp'] = $timeStamps;
	$post_data['uuid'] = $uuid;
	$post_data['version'] = $version;
	$post_data['sign'] = $sign;
	$url='https://open.e.189.cn/api/oauth2/llb/grantTicket.do';  //兑流量券接口
	$o="";
	foreach ($post_data as $k=>$v)
	{
		$o.= "$k=".urlencode($v)."&";
	}
	$post_data=substr($o,0,-1); //拼接url
	
	$ch = curl_init();	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');//为了支持cookie
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$jsonResult = curl_exec($ch);
	
	/*5、将返回的json解释成数组*/
	$arrResult = json_decode($jsonResult);
	
	/*6、如果返回结果成功，修改电话号码和兑劵状态*/
	if($arrResult['result']==0)
	{
		$sqlModifyTelStatus="update a_motherday set tel='$mobile',isConvert=1 where openid='$openId'";
		$rsModifyTelStatus = mysql_query($sqlModifyTelStatus);		
		if($rsModifyTelStatus)
		{
			echo "<script>location.href='download.php';</script>";
		}
	}
?>