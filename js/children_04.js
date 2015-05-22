document.querySelector('.btn-back').addEventListener('touchend', function(){
	page.pageSlide.playTo(0);
});

(function(){
	var userAgent = /android\s+([\d\.]+)/i.exec(navigator.userAgent);
	var isAndroid = userAgent ? true : false;
	var androidVersion = userAgent ? parseFloat(userAgent[1]) : null;
	var inWX = /micromessenger\s*\//i.test(navigator.userAgent);
	var inQQ = /qq\s*\//i.test(navigator.userAgent);


	if(isAndroid && androidVersion < 4) {
		new page.Notice('<p style="font-size:14px;">您当前版本不支持</p>');
		return;
	}

	document.querySelector('.real-btn').addEventListener('touchstart', function(){
		if(isAndroid && androidVersion >= 5.0 && (inWX || inQQ)) {
			new page.Notice('<p style="padding:0 50px;font-size:14px;">由于您当前系统权限限制，请点击右上方菜单使用浏览器打开</p>');
		}
	});
})();