<?php
	$db=mysql_connect("localhost","root","");
	$sqlname="eramus";
	mysql_select_db($sqlname,$db);
	mysql_query("SET NAMES 'UTF8'",$db);
?>