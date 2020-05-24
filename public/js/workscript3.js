
$.ajaxSetup({
	headers:{
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

});

$(window).scroll(function() {
		var top = $(document).scrollTop();
		var bottom = $(document).scrollTop()+$(window).height();
		var  width = $(window).width();
		if(width >800){
			if (top > 30)
			{
				$(".top-line").hide();
				$(".fxmn").addClass("fixed");

			}
			else{
				$(".top-line").show();
				$(".fxmn").removeClass("fixed");
			}
			
			if(top<500){
				$(".bron-dv").show();
				$(".cher-ico").show();				
				$(".cher-cont").show();				
				$(".logos-cher").show();				
				$(".char-text").show();
			}else{
				$(".cher-ico").hide();				
				$(".cher-cont").hide();				
				$(".logos-cher").hide();				
				$(".char-text").hide();				
			}			
			if(top<1600 && top>800){
				$(".pr1").show();
			}else{
				$(".pr1").hide();
			}
			if(top<350){
				$("#doorhead").removeAttr("style");	
				$(".h-left2").hide();
				$(".br-title").show();
				$(".br-s-tit").show();
				$(".butDoor").show();
				$(".cont-d").show();
			}else{
				$("#doorhead").css({"background-color":"black"});
				$(".h-left2").show();
				$(".br-title").hide();				
				$(".br-s-tit").hide();				
				$(".butDoor").hide();				
				$(".cont-d").hide();				
			}
			if(top<700){
				$(".text-D2").show();
				$(".hw-img").show();
			}else{
				$(".text-D2").hide();
				$(".hw-img").hide();
			}
			
			console.log(top);
			
		}else{
			
			if(top<1000){
				$(".cher-ico").show();				
				$(".cher-cont").show();				
				$(".logos-cher").show();				
				$(".char-text").show();
			}else{
				$(".cher-ico").hide();				
				$(".cher-cont").hide();				
				$(".logos-cher").hide();				
				$(".char-text").hide();

				
			}
			if(top<1600 && top>450){
				$(".hw-img").show();
			}else{
				$(".hw-img").hide();
			}
			
			if(top<600){
				$(".br-title").show();
				$(".br-s-tit").show();
				$(".butDoor").show();
				$(".cont-d").show();
			}else{
				$(".br-title").hide();				
				$(".br-s-tit").hide();				
				$(".butDoor").hide();				
				$(".cont-d").hide()
			}
			
			if(top<1300 && top>300 ){
				$(".text-D2").show();
			}else{
				$(".text-D2").hide();
			}
			if(top<3500 && top>1400 ){
				$(".pr1").show();
			}else{
				$(".pr1").hide();
			}
			
			
			if(top<100){
				$("#doorhead").removeAttr("style");
				$(".h-left2").hide();				
			}else{
				$("#doorhead").css({"background-color":"black"});
				$(".h-left2").show();
			}
			console.log(top);
			
			
		}
		
		

});

$( document ).ready(function() { 
		
		
		var height = $("#first").height();
		var thirth = $("#thirth").height();
		
		$("#first").css({"height":""+height+"px"});
		$("#thirth").css({"height":""+thirth+"px"}); 
		
		$(".thumb-l").hover(function(){
			$(this).toggleClass("animated pulse");
		});
		
		$(".o-close").click(function(){
			$(".overlay").hide();
		});
		$(".thumb-l").click(function(){
			var type = $(this).attr("data-type");
			var id =$(this).attr("data-id");
			var src = $(this).find("img").attr("src");
			var w = $(this).find("img").width();
			var h = $(this).find("img").height();
			console.log(w);
			console.log(h);
			if($(this).hasClass("ver")){
				$("#o-main-img").addClass("verimg");
				$("#o-main-img").removeClass("horimg");
			}else{
				$("#o-main-img").addClass("horimg");
				$("#o-main-img").removeClass("verimg");				
			}
			$("#o-main-img").attr("src",src);
			$("#o-main-img").attr("data-type",type);
			$("#o-main-img").attr("data-id",id); 
			$(".overlay").show();
		});
		
		$(".o-right").click(function(){ 
				console.log("cliked");
				var type = $("#o-main-img").attr("data-type");
				var id =$("#o-main-img").attr("data-id");
				if(id>=5){
					id = 1;
				}else{
					id = +id +1;
				}
				console.log(type); 
				console.log(id); 
				var src= $(".thumb-l[data-type='"+type+"'][data-id='"+id+"'] img").attr("src"); 
				
				if($(".thumb-l[data-type='"+type+"'][data-id='"+id+"']").hasClass("ver")){
				$("#o-main-img").addClass("verimg");
				$("#o-main-img").removeClass("horimg");
				}else{
				$("#o-main-img").addClass("horimg");
				$("#o-main-img").removeClass("verimg");				
				}
				
				$("#o-main-img").attr("src",src);
				$("#o-main-img").attr("data-type",type);
				$("#o-main-img").attr("data-id",id); 
				
		}); 
		$('.ovr-cont').disableSelection();
		$(".o-left").click(function(){ 
				console.log("cliked");
				var type = $("#o-main-img").attr("data-type");
				var id =$("#o-main-img").attr("data-id");
				if(id<=1){
					id = 5;
				}else{
					id = +id -1;
				}
				console.log(type); 
				console.log(id); 
				var src= $(".thumb-l[data-type='"+type+"'][data-id='"+id+"'] img").attr("src"); 
				
				if($(".thumb-l[data-type='"+type+"'][data-id='"+id+"']").hasClass("ver")){
				$("#o-main-img").addClass("verimg");
				$("#o-main-img").removeClass("horimg");
				}else{
				$("#o-main-img").addClass("horimg");
				$("#o-main-img").removeClass("verimg");				
				}
				
				$("#o-main-img").attr("src",src);
				$("#o-main-img").attr("data-type",type);
				$("#o-main-img").attr("data-id",id); 
				
		}); 
		
		$('a[href^="#"]').on('click', function (e) {
		e.preventDefault();
		
		var target = this.hash;
		var $target = $(target);
		console.log($target.offset().top);
		$('html, body').animate({
			'scrollTop': $target.offset().top-250
		}, 1000, 'swing');
		}); 
		
		$("#send-order").click(function(){
			var name = $("#name").val();
			var phone = $("#phone").val();
			var email = $(".order input[type='email']").val();
			var textareaa = $("#textarea").val(); 
			console.log(name);
			
			if(name!='' && phone!=''&& typeof(name) != "undefined" && typeof(phone) != "undefined"){
				$(".error").hide();
				
				$.post("/saveOrder", {name:name,phone:phone,textareaa:textareaa,email:email}, function(html) {
					if(html ==1){
						$(".resss").html("<div class='zkz-accept'>Спасибо! Ваш заказ принят</div>")
					}
				});
				
			}else{
				$(".error").html("Заполните все поля");
				$(".error").show();
			}
			
		});
		
		
		
});

