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

	// Generic function to initialize prettyPhoto
	function init_prettyPhoto(target) {
		var gallery_name = 'prettyPhoto[' + target + ']';

		$(target + ' a').attr('rel', gallery_name);
		$("a[rel^='" + gallery_name + "']").prettyPhoto();
		$(target + ":first a[rel^='" + gallery_name + "']").prettyPhoto({
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
	}

	init_prettyPhoto('.gallery');
	init_prettyPhoto('.events-list');

	// Generic function to draw pagination links
	function draw_pager(target, num_per_page) {		
		$(target).after(function(){
			var pages = Math.floor($(this).find('dt').length / num_per_page) + 1;
			var output = '<ul class="gallery-pager">';
			for (i=1; i<=pages; i++) {
				output = output + '<li><a href="#" data-target="' + target + '" data-size="' + num_per_page + '">' + i + '</a></li>';
			}
			output = output + "</ul>";
			return output;
		});
	}

	draw_pager('.gallery', 6);
	draw_pager('.events-list', 3);


	// Gallery pagination
	$('.gallery-pager a').click(function(e){
		e.preventDefault();
		var page = $(this).html() - 1;
		var per_page = $(this).attr('data-size');
		var target = $(this).attr('data-target') + ' dl';
		var first = (page * per_page) + 1;
		var last = ((page * per_page) + (per_page + 1));
		$(target).fadeOut(500);
		$(target + ':nth-of-type(n+' + first + '):nth-of-type(-n+' + last + ')').fadeIn(500);
	});
});