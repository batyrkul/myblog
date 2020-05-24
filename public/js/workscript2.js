
$.ajaxSetup({
	headers:{
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

});

$(window).scroll(function() {
		var top = $(document).scrollTop();
		var bottom = $(document).scrollTop()+$(window).height();
		var  width = $(window).width();
		
		
		

});

$( document ).ready(function() { 
		
		
		var height = $("#first").height();
		var thirth = $("#thirth").height();
		
		$("#first").css({"height":""+height+"px"});
		$("#thirth").css({"height":""+thirth+"px"}); 
		
		$(".blck").hover(function(){
			$(this).find(".catimg").toggleClass("animated pulse");
		});
		
		 
		 
		
});

