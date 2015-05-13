// main
(function(){

	// page slide
	page.pageSlide = new m.Slide({
		target: document.querySelectorAll('.pages .page'),
		direction: 'x',
		onchangebefore: function(i){
			var pageName = 'others';
			switch(i){
				case 0:  pageName = 'home'; break;
				case 1: pageName = 'eidtor'; break;
			}

			if(page.eidtor) page.eidtor.clear();
		}
	});

	// main slide
	page.p1Slide = new m.Slide({
		target: document.querySelectorAll('.p1 .sub-page'),
		trigger: document.querySelectorAll('.p1 nav li'),
		onchange: function(i){
			var pageName = 'others';
			switch(i){
				case 0: pageName = 'video'; break;
				case 1: pageName = 'photo'; break;
				case 2: pageName = 'act'; break;
			}
		},
		touchMove: true,
		direction: 'y'
	});

	if(/page\s*=\s*photo/.test(decodeURIComponent(location.search))) {
		var oriAnimTime = page.p1Slide.config.animTime;
		page.p1Slide.config.animTime = 0;
		page.p1Slide.playTo(1);
		window.setTimeout(function(){
			page.p1Slide.config.animTime = oriAnimTime;
		}, oriAnimTime);
	}


	var p2 = document.querySelector('.p2 .tools');
	var enableScroll = function(elem){
		var scrollStartPos = 0;
		elem.addEventListener("touchstart", function(e) {
			scrollStartPos= this.scrollTop + e.touches[0].pageY;
			e.preventDefault();
		},false);
		elem.addEventListener("touchmove", function(e) {
			this.scrollTop=scrollStartPos-e.touches[0].pageY;
			e.preventDefault();
		},false);	
	};
})();