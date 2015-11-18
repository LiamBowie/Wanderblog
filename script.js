$(document).ready(function () {

	var menu = $('.sticky-sidebar');
	var origOffsetY = menu.offset().top;

	function scroll() {
		if ($(window).scrollTop() >= origOffsetY) {
			$('.sticky-sidebar').addClass('sticky');
			$('.content').addClass('menu-padding');
		} else {
			$('.sticky-sidebar').removeClass('sticky');
			$('.content').removeClass('menu-padding');
		}
	}

	document.onscroll = scroll;

});