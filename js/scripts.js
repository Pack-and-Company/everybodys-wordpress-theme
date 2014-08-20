jQuery(document).ready(function($){
	// Add selected class if nav menu target matches id of containing page element
	$('.page').each(function(){
		$(this).find("a[href='#" + $(this).attr('id') + "']").addClass('selected');
	});

	// Add pdf class to links to pdf files
	$('a[href$=pdf]').addClass('pdf');

	// Override anchor links to animate scrolling
	$(".menu a").click(function(e) {
		e.preventDefault();
		$('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top
	    }, 1000, 'easeInOutQuart');
	});

	// Initialize prettyPhoto
	$('.gallery a').attr('rel', 'prettyPhoto[mixed]');
	$("a[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed:'normal',
		slideshow:8000,
		social_tools:false,
		autoplay_slideshow: false,
		overlay_gallery:false,
		show_title: true,
		allow_resize: true,
		default_width: 320,
		wmode: 'opaque'
	});

	// Draw gallery pagination links
	$('.gallery').after(function(){
		var pages = Math.floor($(this).find('dt').length / 6) + 1;
		var output = '<ul class="gallery-pager">';
		for (i=1; i<=pages; i++) {
			output = output + '<li><a href="#">' + i + '</a></li>';
		}
		output = output + "</ul>";
		return output;
	});

	// Pagination for image gallery
	$('.gallery-pager a').click(function(e){
		e.preventDefault();
		var page = $(this).html() - 1;
		var first = (page * 6) + 1;
		var last = ((page * 6) + 7);
		$('.gallery-item').fadeOut(500);
		$('.gallery-item:nth-of-type(n+' + first + '):nth-of-type(-n+' + last + ')').fadeIn(500);
	});
});