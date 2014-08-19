jQuery(document).ready(function($){
	// Add selected class if nav menu target matches id of containing page element
	$('.page').each(function(){
		$(this).find("a[href='#" + $(this).attr('id') + "']").addClass('selected');
	});

	// Add pdf class to links to pdf files
	$('a[href$=pdf').addClass('pdf');

	// Override anchor links to animate scrolling
	$(".menu a").click(function(e) {
		e.preventDefault();
		$('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 1000, 'easeInOutQuart');
	});
});