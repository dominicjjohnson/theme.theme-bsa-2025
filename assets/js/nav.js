jQuery(document).ready(function($){

	$('.header').scrollToFixed();
	
	// Mobile Navigation Toggle
	$('.nav-toggle').on('click', function(e) {
		e.preventDefault();
		$('body').toggleClass('nav-is-open');
		
		// Update button text/icon
		if ($('body').hasClass('nav-is-open')) {
			$(this).text('Close');
			$(this).addClass('is-open');
		} else {
			$(this).text('Menu');
			$(this).removeClass('is-open');
		}
	});
	
	// Close mobile menu when clicking on a menu link
	$('.nav .menu a').on('click', function() {
		if ($(window).width() < 640) {
			$('body').removeClass('nav-is-open');
			$('.nav-toggle').text('Menu').removeClass('is-open');
		}
	});
	
	// Close mobile menu when resizing to desktop
	$(window).on('resize', function() {
		if ($(window).width() >= 640) {
			$('body').removeClass('nav-is-open');
			$('.nav-toggle').text('Menu').removeClass('is-open');
		}
	});
	
});