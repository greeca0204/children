<?php
	/*�����������ַ������ȣ����������һ������Ϊnλ���������*/
	function randomkeys($length)
	{
		$key="";
		$pattern='1234567890';
		for($i=0;$i<$length;$i++)
		{
			$key .= $pattern{mt_rand(0,9)};    //����php�����
		}
		return $key;
	}
	
	/*��ȡʱ���,��ȷ����nλ*/
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