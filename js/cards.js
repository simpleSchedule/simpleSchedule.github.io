$(document).ready(function () {

	// Function to show the card according to the ID (id of the div that was clicked).
	showCard = function (id) {

		// Select the card with correct id and make it "object".
		object = $('[card=' + id + ']');
		$('.card-indicator').css('width', $('.card-tab').css('width'));

		// Set the card visible first, then bring it up from the bottom of the screen
		object.css('visibility', 'visible');
		setTimeout(function () {
			object.addClass('card-to-top');
		}, 200);

	};





	// Card close button
		$('.header-close').on('click', function () {
			clickDim();
		});




	// Function to add 1 time row to the selected day
	$('.add-time-button').on('click', function () {
		id = $(this).attr('id');
		day = '#' + id + '.day-card';
		html = $(day).html();
		$(day).append('<div class="day-card-row-container"><div class="day-card-row pt16-dark"><div class="select-time">Event 1<div class="list-indicator list-indicator-dark"></div></div><div class="delete-me"></div><div class="input-text input-text-number input-text-number-first input-text-dark"><input placeholder="End" class="pt14-dark" name="event-end"></input><div class="input-indicator input-indicator-dark"><div class="input-indicator-active secondary-bg-color"></div></div></div><div class="input-text input-text-number input-text-dark"><input placeholder="Start" class="pt14-dark" name="event-start"></input><div class="input-indicator input-indicator-dark"><div class="input-indicator-active secondary-bg-color"></div></div></div></div></div>');
	});




	// Delete day tabs clicked row
	$(document).on('click', '.delete-me', function () {
		$(this).parent().parent().remove();
	});





	// Switching between events card days
	$('.card-tab').on('click', function () {

		if ($('.card-indicator').css('width') !== $('.card-tab').css('width')) {
			$('.card-indicator').css('width', $('.card-tab').css('width'));
		}

		$('.card-tab').removeClass('secondary-color');

		id = parseInt($(this).attr('id'));
		margin = id * 14.2857 + '%';
		dayMargin = (parseInt(id) * -100) + '%';
		name = parseInt(id + 1);

		$('.add-time-button-days').attr('id', name);

		$(this).addClass('secondary-color');
		$('.card-indicator').css('margin-left', margin);
		$('.day-cards-flow').css('margin-left', dayMargin);

	});




	// COLOR PICKER
	$('.color-picker').on('click', function () {
		box = $(this).find('.colors-box');
		if (box.css('opacity') === '0') {
			box.css('display', 'block');
			setTimeout(function () {
				box.css('opacity', '1');
			}, 10);
		}
	});

	$('.colors-box').on('mouseleave', function () {
		box = $(this);
		box.css('opacity', '');
		setTimeout(function () {
			box.css('display', '');
		}, 200);
	});

	$('.color').on('click', function (e) {
		clicked = $(this);
		box = $(this).parent();
		box.find('.selected-color').css('opacity', '');

		setTimeout(function () {
			box.find('.selected-color-auto').remove();
		}, 200);

		setTimeout(function () {
			if (clicked.find('.selected-color') !== true) {
				clicked.append('<div class="selected-color"></div>');
			}
		}, 10);

		setTimeout(function () {
			clicked.find('.selected-color').css('opacity', '1');
		}, 20);

		color = $(this).css('background-color');
		id = box.attr('id');
		$('[card-color=' + id +']').css('background-color', color);

		if ($('body').hasClass('mobile') === true) {
			box.css('opacity', '');
			setTimeout(function () {
				box.css('display', '');
			}, 200);
		}

		e.stopPropagation();

	});

});
