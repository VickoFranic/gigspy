</div>
<script type="text/javascript">
	$(window).load(function() {
	    setTimeout(function() {
			  $('#preloader').fadeOut('slow', function() {
			    $('.wrap').removeClass('invisible');
			    $('body').addClass('animated fadeIn');
			    $('.navbar-side').addClass('animated bounceInUp');
			    $('#page-inner').addClass('animated fadeInRightBig');
			});
		}, 500);
	});
</script>