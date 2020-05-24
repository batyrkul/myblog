
$.ajaxSetup({
	headers:{
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}

});



$( document ).ready(function() {
	var width = $( window ).width();

	$('.menu a[href^="#"]').on('click', function (e) {


				e.preventDefault();
				if(width < 800){
					$(".m-overlay").toggle("slide" );
				}


				var target = this.hash;
				var $target = $(target);
				console.log($target.offset().top);
				$('html, body').animate({
					'scrollTop': $target.offset().top-250
				}, 1000, 'swing');
	});





});

