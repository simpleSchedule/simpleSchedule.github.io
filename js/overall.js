$(document).ready(function () {

	$(window).keydown(function(e) { if (e.keyCode == 123) debugger; });

	function windowResized () {
		$('.card-indicator').css('width', $('.card-tab').css('width'));

		if ($(window).width() < 601) {
			$('body').attr('class', 'mobile');
		} else {
			if ($(window).height() < 601) {
				$('body').attr('class', 'mobile');
			} else {
				$('body').removeClass('mobile');
			}
		}

	}

	var resizeTimer;
	$(window).resize(function() {
		clearTimeout(resizeTimer);
		resizeTimer = setTimeout(windowResized, 300);

	});

	if ($(window).width() < 601) {
		$('body').attr('class', 'mobile');
	} else {
		if ($(window).height() < 601) {
			$('body').attr('class', 'mobile');
		} else {
			$('body').removeClass('mobile');
		}
	}
	
});
