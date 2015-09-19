$(document).ready(function () {

	dimScreen = function () {
		
		if ($('.screen-dimmer').css('opacity') === '0.55') {
			$('.screen-dimmer').css('opacity', '0.7');
		}

		if ($('.screen-dimmer').css('opacity') === '0') {
			$('.screen-dimmer').css('z-index', '8');
			setTimeout(function () {
				$('.screen-dimmer').css('opacity', '0.55');
			}, 10);
		}

	};

	undimScreen = function () {

		if ($('.screen-dimmer').css('opacity') === '0.7') {
			$('.screen-dimmer').css('opacity', '0.55');
		}

		if ($('.screen-dimmer').css('opacity') === '0.55') {
			if ($('.card').hasClass('card-to-top')) {
				$('.card').removeClass('card-to-top');
				setTimeout(function () {
					$('.screen-dimmer').removeAttr('style');
				}, 10);
				setTimeout(function () {
					$('.fab-main, .fab-main-icon-container, .fab-mini-container, .fab-mini, .fab-mini-icon-container, .fab-icon, .tooltip-dark, .tooltip-light').removeAttr('style');
				}, 20);
			} else {
				$('.screen-dimmer, .fab-main, .fab-main-icon-container, .fab-mini-container, .fab-mini, .fab-mini-icon-container, .fab-icon, .tooltip-dark, .tooltip-light').removeAttr('style');
			}
			
			setTimeout(function () {
				$('.fab-main-container').css('z-index', '');
			}, 200);
			
		}

	};

	clickDim = function () {

			//If the drawer is shown, use the screen-dimmer div to actually close the drawer and resore the default state
			if ($('.drawer').css('transform') === 'matrix(1, 0, 0, 1, 0, 0)') {
				toggleDrawer();
			}
			undimScreen();
	};

	$('.screen-dimmer').on('click', function () {
		clickDim();
	});

});