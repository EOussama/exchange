$(document).ready(function() {
	const
		$headerHeight = $('header div.jumbotron').outerHeight(),
		$navbar = $('nav.navbar.sticky-top');
	
	$(window).on('scroll', function() {
		if($headerHeight <= this.scrollY)
			$navbar.addClass('sticky');
		else
			$navbar.removeClass('sticky');
	});
});