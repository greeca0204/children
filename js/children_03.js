page.Notice = function(text){
	this.container = $('<div><p style="margin-top:50%">'+text+'</div>').appendTo('body');
	this.container.css({
		'position': 'absolute',
		'width': '100%',
		'height': '100%',
		'left': '0',
		'top': '0',
		'background-color': 'rgba(0,0,0,0.8)',
		'color': '#fff',
		'z-index': '9999',
		'text-align': 'center'
	});
};
		

page.Notice.prototype.setInfo = function(text){
	this.container.find('p').text(text);
}	

page.Notice.prototype.show = function(){
	this.container.show();
}		

page.Notice.prototype.remove = function(){
	this.container.remove();
}

Zepto(function($){

	page.eidtor = new tg.ImageEditor({
				
		trigger: $('#file'),
		container: $('#container'),
		//width: $(window).get(0).innerWidth,
		width:320,
		height: 280,
		stageX:  $('#container')[0].offsetLeft,
		iconScale: {
			url: 'images/icon.png',
			rect: [300, 300, 25, 25]
		},

		event: {		
			beforechange: function(){
				page.pageSlide.playTo(1);
				window.setTimeout(function(){
					$('.tools .list-role li').eq(0).trigger('tap');
				}, 1000);
			},
			change: function(){}
		}
				
	});

	// 合影功能
	var roleTrigger =   $('.tools .list-role li');
	var mcFg,mcFg2,mcFg3,mcFg4,mcFg5,mcRole;
	roleTrigger.each(function(i, elem){	

		$(elem).on('tap', function(e){
			roleTrigger.removeClass('current');//去掉默认模版打钩
			$(this).addClass('current');//选择模版打钩
			mcFg && page.eidtor.stage.removeChild(mcFg);
			mcRole && page.eidtor.stage.removeChild(mcRole);
			mcFg2 && page.eidtor.stage.removeChild(mcFg2);
			mcFg3 && page.eidtor.stage.removeChild(mcFg3);
			mcFg4 && page.eidtor.stage.removeChild(mcFg4);
			mcFg5 && page.eidtor.stage.removeChild(mcFg5);
							
							//显示框图
							/*
							var elemImg =  $(this).find('img');
							if(elemImg.length > 0) {
								var imgURL = elemImg.attr('src');
								var img = new Image();
							
								img.onload = function(){
									mcRole = page.eidtor.addImage({'img': img, 'pos': [0, 0], 'disScale': true, 'disMove': true});
									page.game = imgURL.replace(/^.+role-(\w+)\.(?:png|jpg|jpeg)$/i, function(a,b,c){return b});
								}
								img.src = imgURL;
							}
							*/
							
			//显示框图 上右下左
			var fg = $(this).data('fg');
			if(fg) {
				var fgImg = new Image();
				fgImg.onload = function(){
					mcFg = page.eidtor.addImage({'img': fgImg,  'pos': fg.pos, 'disScale': true, 'disMove': !fg.move});
				}
				fgImg.src = fg.src;	
			}

			var fg2 = $(this).data('fg2');
			if(fg2) {
				var fgImg2 = new Image();
				fgImg2.onload = function(){
					mcFg2 = page.eidtor.addImage({'img': fgImg2,  'pos': fg2.pos, 'disScale': true, 'disMove': !fg2.move});
				}
				fgImg2.src = fg2.src;
			}

			var fg3 = $(this).data('fg3');
			if(fg3) {
				var fgImg3 = new Image();
				fgImg3.onload = function(){
					mcFg3 = page.eidtor.addImage({'img': fgImg3,  'pos': fg3.pos, 'disScale': true, 'disMove': !fg3.move});
				}
				fgImg3.src = fg3.src;
			}

			var fg4 = $(this).data('fg4');
			if(fg4) {
				var fgImg4 = new Image();
				fgImg4.onload = function(){
					mcFg4 = page.eidtor.addImage({'img': fgImg4,  'pos': fg4.pos, 'disScale': true, 'disMove': !fg4.move});
				}	
				fgImg4.src = fg4.src;
			}
		});
	});

	$(document).on('touchend', function(){
		page.eidtor.unSelect();
	});

	$('.btn-save').on('touchend', function(){
	    var notice = new page.Notice('照片合成中……');

		// 去除编辑状态的元素
		page.eidtor.toDataURL(function(data){
			notice.setInfo('照片上传中……');
			$.post('uploadPicView.php', {pic: data}, function(data){
				document.write(data);
			});
		});	    			
	})
});	