/*��������Ȧ������*/
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
	//��������Ȧ
	wx.onMenuShareTimeline(wxData1);
	//���������
	wx.onMenuShareAppMessage(wxData2);
);

wx.error(function (res) {
	alert(res.errMsg);
	location.reload();
});