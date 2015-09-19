$(document).ready(function () {


	restoreFAB = function () {
		$('.fab-main-container').css('z-index', '7');
		$('.fab-mini-container').css('z-index', '6');
		setTimeout(function () {
			$('.fab-main-container, .fab-mini-container, .fab-mini-icon-container, .fab-mini, .fab-icon, .tooltip-dark, .tooltip-light').css('height', '').css('width', '').css('transform', '').css('opacity', '');
		}, 20);
	}

	//MAIN FAB
	$('.fab-main-container').click(function () {
		mini = $('#' + $(this).attr('id') + '.fab-mini');
		tooltip = $('.tooltip-' + $(this).attr('class').split("-").pop());

		if (mini.css('width') === '0px') {
			mini.css('width', '40px').css('height', '40px');
			mini.find('.fab-mini-icon-container').css('width', '18px').css('height', '18px');
			if (mini.parent().hasClass('fab-mini-container-task') === true) {
				$('.fab-mini-container-task').css('transform', 'translateY(-107px)');
			}
			if (mini.parent().hasClass('fab-mini-container-event') === true) {
				$('.fab-mini-container-event').css('transform', 'translateY(-57px)');
			}
			tooltip.css('opacity', '1').css('transform', 'translateY(-20px)');
			$(this).find('.fab-icon').css('transform', 'rotate(45deg)');
			dimScreen();
		} else {
			undimScreen();
		}

	});



	//EVENT mini-FAB
	$('.fab-mini-container').click(function () {
		id = $(this).attr('class').split("-").pop();

		helper = $(this).find('.fab-mini').attr('id');
		mini = $('.fab-mini-' + helper);
		miniIcon = mini.find('.fab-mini-icon-container');
		miniContainer = $('.fab-mini-container-' + helper);

		restoreFAB();

		setTimeout(function () {
			showCard(id);
		}, 20);
	});

});
