//电话号码认证
function validate()
{
	var tel = document.getElementById("tel").value;
	var tel_head = tel.substr(0,3);

	var re = /^1[3|4|5|8][0-9]\d{4,8}$/;   //判断字符串是否为数字,//若判断正整数，则后边是：/^[1-9]+[0-9]*]*$/
				
	if(tel==""){
		alert("请输入电话号码！");
		return false;
	}
	else if (!re.test(tel)){
		alert("请输入正确的电话号码！");
		return false;
	}
	else if(tel.length!=11){
		alert('请输入正确的电话号码！');
		return false;
	}
	else{
		if(tel_head=='133'||tel_head=='153'||tel_head=='180'||tel_head=='181'||tel_head=='189'){
			return true;
		}
		else if(tel_head=='134'||tel_head=='135'||tel_head=='136'||tel_head=='137'||tel_head=='138'||tel_head=='139'
			||tel_head=='147'||tel_head=='150'||tel_head=='151'||tel_head=='152'||tel_head=='157'||tel_head=='158'
			||tel_head=='159'||tel_head=='182'||tel_head=='183'||tel_head=='184'||tel_head=='187'||tel_head=='188'
			||tel_head=='130'||tel_head=='131'||tel_head=='132'||tel_head=='145'||tel_head=='155'||tel_head=='156'
			||tel_head=='185'||tel_head=='186'){
			alert('暂不支持移动和联通手机用户！');
			return false;
		}		
		else{
			alert('此手机号非法！');
			return false;
		}
	}
}