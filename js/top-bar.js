$(document).ready(function () {

	var firstRun = 0;
	wtab1 = parseInt($('.tab-1').css('width')) + 30;

	setTimeout(function(){
				wtab1 = parseInt($('.tab-1').css('width')) + 30;
			$('.tab-indicator').css('width', wtab1);
		}, 300);

	disableTabs = function () {
		$('.tab').removeClass('input-color-light');
	}
	$('.tab-indicator').css('width', wtab1);

	//Navigating between the tabs
	$('.tab').on('click', function () {

	if (firstRun === 0) {

		firstRun = 1;

		wtab1 = parseInt($('.tab-1').css('width')) + 30;
		wtab2 = parseInt($('.tab-2').css('width')) + 30;
		wtab3 = parseInt($('.tab-3').css('width')) + 30;
		wtab4 = parseInt($('.tab-4').css('width')) + 30;

		wtab1t = 0;
		wtab2t = wtab1;
		wtab3t = wtab1 + wtab2;
		wtab4t = wtab1 + wtab2 + wtab3;

	}

		id = $(this).attr('class').split("-").pop();
		wtabid = 'wtab' + id;

		disableTabs();

			$(this).addClass('input-color-light');
			$('.tab-indicator').css('width', eval(wtabid)).css('transform', 'translateX(' + eval(wtabid + 't') + 'px)');
			console.log('translateX(' + eval(wtabid + 't') + ')');
		
	});

	$('.drawer-button').on('click', function () {
		toggleDrawer();
	});

	$('.drawer-link').on('click', function () {
		setTimeout(function () {
		toggleDrawer();
		}, 350);
	});

	$('.profile').on('mouseenter', function () {
		$('.profile-box-container').css('display', 'inline-block');
		setTimeout(function () {
			$('.profile-box').css('height', '130px').css('opacity', '1');
			$('.profile-picture').css('height', '50px').css('width', '50px');
			$('.profile-box-hider').css('z-index', '3');
		}, 50);
	});

	$('.profile-box-hider').on('mouseenter', function () {
		$('.profile-box, .profile-picture').css('height', '').css('width', '').css('opacity', '');
		$('.profile-box-hider').css('z-index', '');
		$('.profile-box-container').css('display', '');
	});

});