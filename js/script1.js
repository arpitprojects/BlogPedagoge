$(window).scroll(function(){
	var wscroll  = $(this).scrollTop();
	
	if(wscroll > $('header').offset().top + 640) {
		$('#head_color').addClass('class');
		$('.toggle i').css('color' , 'black');
	}else{
		$('#head_color').removeClass('class');
		$('.toggle i').css('color' , 'white');
	}
});

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
$('#scroller').click(function(){
	$('body , html').animate({scrollTop : 650}, 1000);
});

$(window).scroll(function(){
	var wscroll  = $(this).scrollTop();
	
	if(wscroll > $('header').offset().top + 640) {
		$('#preloading').css('display' , 'block');
		
	}else{
		$('#preloading').css('display' , 'none');
}
});

 
	
$(document).ready(function(){
		$(window).scroll(function() {
		var s_h = $('#wrapper').height();
		var s_t =  $(this).scrollTop() - 640;
		var d_h = $(document).height();
		console.log(d_h);
		var aggregate = parseInt(1.2*(s_t/(d_h - s_h)*100));
		if(aggregate < 101){
			$(".KW_progressBar").css("width",aggregate+"%");
			$('.KW_progressContainer h3').text(aggregate + ' % READ');
			$('.KW_progressContainer').css('display' , 'block');
			$('.next_prev_post').css('display' , 'none');
			$('#head_color').css('opacity','1');
		}
		else{
			$('.KW_progressContainer').css('display' , 'none');
			$('.next_prev_post').css('display' , 'block');
			$('#head_color').css('opacity','.8').css('backgroundColor' , '#e0e0e0 !important');
		}
	});
});