
(function(){
	var body = $('body');
	$('.toggle').bind('click' , function(){
		body.toggleClass('trigger');
		return false;
	});
})();
(function(){
	var body = $('body');
	$('.toggle1').bind('click' , function(){
		body.toggleClass('trigger');
		return false;
	});
})();

$(window).scroll(function(){
	var wscroll  = $(this).scrollTop();
	
	if(wscroll > $('header').offset().top + 320) {
		$('#head_color').addClass('class');
	}else{
		$('#head_color').removeClass('class');
	}
});

$('#load_more').click(function(){
	//console.log('hi');
	
});

$(window).scroll(function(){
	var wscroll  = $(this).scrollTop();
	
	if(wscroll > $('header').offset().top + 320) {
		$('.toggle i').css('color' , 'black').css('z-index' , '1 !important');
	}else{
		$('.toggle i').css('color' , 'white');
	}
});