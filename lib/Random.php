<?php
	/*参数中输入字符串长度，可随机生成一个长度为n位的随机序列*/
	function randomkeys($length)
	{
		$key="";
		$pattern='1234567890';
		for($i=0;$i<$length;$i++)
		{
			$key .= $pattern{mt_rand(0,9)};    //生成php随机数
		}
		return $key;
	}
	
	/*获取时间戳,精确到第n位*/
	function getTimestamp($digits = false) {  
        $digits = $digits > 10 ? $digits : 10;  
        $digits = $digits - 10;  
        if ((!$digits) || ($digits == 10))  
        {  
            return time();  
        }  
        else  
        {  
            return number_format(microtime(true),$digits,'','');  
        }  
    }
?>