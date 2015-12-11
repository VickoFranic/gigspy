$(window).load(function() {
	$('#preloader').fadeOut('slow', function() {
		$('.wrap').removeClass('invisible');
		$('.navbar-side').addClass('animated fadeInUpBig');
		$('#page-inner').addClass('animated fadeInRightBig');
	});
});
