jQuery(document).ready(function($){
	$('.page').each(function(){
		$(this).find("a[href='#" + $(this).attr('id') + "']").addClass('selected');
	});

	$('a[href$=pdf').addClass('pdf');

	$(".menu a").click(function(e) {
		e.preventDefault();
		$('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 1000, 'easeInOutQuart');
	});
});