<?php
	
	/*要完成分享，服务器端要完成以下操作：*/
	/*1、构造分享URL，将其拼接起来*/
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$link = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
	
	/*2、往流量宝接口发送请求，拼接url*/
	$url = sprintf("http://nb.189.cn/portal/getWeixinJsSign.do?sUrl=%s",urlencode($link));
	
	/*3、使用PHP模拟GET方法提交URL，请求服务器，返回json*/
	$res = file_get_contents($url);
	
	/*将json解压成数组形式返回*/
	$res = json_decode($res,true);
?>