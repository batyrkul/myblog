$(function(){
	$('.main-img').disableSelection(); 
	$('.main-img img').disableSelection(); 
	$('.ttr').disableSelection(); 
	
	$(".gal-right").click(function(){
		var current = $(".main-img").attr("data-current");
		var total = $(".main-img").attr("data-total");
		current = +current +1;
		if(current<=total){
			var src = $(".gall-thumb[data-id='"+current+"'] img").attr("src");
			$(".main-img img").attr("src",src);
			$(".main-img").attr("data-current",current);
		}else{
			var src = $(".gall-thumb[data-id='1'] img").attr("src");
			$(".main-img img").attr("src",src);
			$(".main-img").attr("data-current","1");
		}
		
	});
	$(".gal-left").click(function(){
		var current = $(".main-img").attr("data-current");
		var total = $(".main-img").attr("data-total");
		current = +current -1;
		if(current>0){
			var src = $(".gall-thumb[data-id='"+current+"'] img").attr("src");
			$(".main-img img").attr("src",src);
			$(".main-img").attr("data-current",current);
		}else{
			var src = $(".gall-thumb[data-id='10'] img").attr("src");
			$(".main-img img").attr("src",src);
			$(".main-img").attr("data-current","10");
		}
		
	});
	
	$(".gall-thumb").hover(function(){
		$(this).toggleClass("hover"); 
	})
	
	$(".gall-thumb").click(function(){
		var id = $(this).attr("data-id");
		var src = $(this).find("img").attr("src"); 
		$(".main-img").attr("data-current",id);
		$(".main-img img").attr("src",src); 
		
	});
	
})