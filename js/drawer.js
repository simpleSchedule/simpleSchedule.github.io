$(document).ready(function () {

	//Function to close/hide drawer
	toggleDrawer = function () {
		if ($('.drawer').css('transform') !== 'matrix(1, 0, 0, 1, 0, 0)') {
			$('.drawer').css('transform', 'translateX(0)');
			$('.fab-main-container').css('z-index', '1');
			setTimeout(function () {
				dimScreen();
			}, 10);
		} else {
			$('.drawer').css('transform', '');
			undimScreen();
		}
	}

	//Navigating between the drawer links
	$('.drawer-link').on('click', function () {
		$('.drawer-link .material-icons, .drawer-link').removeClass('primary-color').removeClass('drawer-link-active');
		$(this).addClass('primary-color').addClass('drawer-link-active').find('i').addClass('primary-color');
		$('.top-bar-title').text($(this).clone().children().remove().end().text());
	});

});
