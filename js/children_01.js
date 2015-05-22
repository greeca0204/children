(function(){
	// name space
	window.page = {};

	// reset page scroll top
	// document.documentElement.scrollTop =  0;
	window.scrollTo(0, 0);


	// disabled default events
	document.documentElement.addEventListener('touchmove', function(e){
		e.preventDefault();
	});

	// for the fucking qq browser
	var pages = document.querySelectorAll('.page');
	for(var i = 0; i < pages.length; i++) {
		pages[i].style.height = window.innerHeight * 3 + 'px';
	}
	var p2Content = document.querySelector('.p2 .content');
	//p2Content.style.height = window.innerHeight - 51 + 'px';
})();