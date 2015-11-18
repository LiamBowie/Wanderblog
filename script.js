$(document).ready(function(){

	// Add smooth scrolling to all links in navbar + footer link
	$(".navbar a, footer a[href='#myPage']").on('click', function(event) {

	// Prevent default anchor click behavior
	event.preventDefault();

	// Store hash
	var hash = this.hash;

	// Using jQuery's animate() method to add smooth page scroll
	// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
	$('html, body').animate({
		scrollTop: $(hash).offset().top
	}, 900, function(){

	// Add hash (#) to URL when done scrolling (default click behavior)
	window.location.hash = hash;

	var menu = $('.sticky-sidebar');
	var origOffsetY = menu.offset().top;

	function scroll() {
		if ($(window).scrollTop() >= origOffsetY) {
			$('.sticky-sidebar').addClass('navbar-fixed-top');
			$('.content').addClass('menu-padding');
		} else {
			$('.sticky-sidebar').removeClass('navbar-fixed-top');
			$('.content').removeClass('menu-padding');
		}
	}
	document.onscroll = scroll;

    });
  });
})