$(document).ready(function () {

	// TEXT INPUT FOCUS
	$(document).on('focusin', '.input-text' , function() {

		if ($(this).hasClass('input-text-dark') === true) {
			pt12 = 'pt12-dark secondary-color';
			if ($(this).hasClass('input-text-large') === true) {
				pt16 = 'pt32-dark';
			} else {
				pt16 = 'pt16-dark';
			}
		} else {
			pt12 = 'pt12-light';
			if ($(this).hasClass('input-text-large') === true) {
				pt16 = 'pt32-light';
			} else {
				pt16 = 'pt16-light';
			}
		}

		indicator = $(this).find('.input-indicator-active');
		label = $(this).find('label');

		indicator.css('margin-left', '0px').css('width', '100%');

		if ($(this).hasClass('input-text-large') === true) {
				label.css('top', '10px');
			} else {
				label.css('top', '16px');
			}
		label.addClass(pt12).removeClass(pt16).css('cursor', 'default');

	});

	// TEXT INPUT UNFOCUS
	$(document).on('focusout', '.input-text' , function() {

		if ($(this).hasClass('input-text-dark') === true) {
			pt12 = 'pt12-dark secondary-color';
			if ($(this).hasClass('input-text-large') === true) {
				pt16 = 'pt32-dark';
			} else {
				pt16 = 'pt16-dark';
			}

		} else {
			pt12 = 'pt12-light';
			if ($(this).hasClass('input-text-large') === true) {
				pt16 = 'pt32-light';
			} else {
				pt16 = 'pt16-light';
			}
		}

		indicator = $(this).find('.input-indicator-active');
		label = $(this).find('label');

		if ($(this).hasClass('input-textarea') === true) {
			input = $(this).find('textarea');
		} else {
			input = $(this).find('input');
		}

		if (input.val() === '') {
			label.css('top', '');
			label.addClass(pt16).removeClass(pt12).css('cursor', '');
			indicator.css('margin-left', '').css('width', '');
		} else {
			label.removeClass('secondary-color');
			indicator.css('margin-left', '0px').css('width', '');
		}

	});


	$('.input-checkbox-container').on('click', function () {
		checkbox = $(this).find('input');
		if(checkbox.prop('checked') !== true) {
			console.log("false");
			checkbox.prop('checked', true);
			$('.input-checkbox i').text('check_box');
			$('.input-checkbox i').addClass('secondary-color').removeClass('input-color-dark');
			$('.card-tabs-bar, .day-cards-container, .add-time-button-days').css('display', 'none');
			$('.one-day-card, .add-time-button-one-day').css('display', 'inline-block');
		} else {
			console.log("true");
			checkbox.prop('checked', false);
			$('.input-checkbox i').text('check_box_outline_blank').addClass('input-color-dark').removeClass('secondary-color');
			$('.card-tabs-bar, .day-cards-container, .add-time-button-days').css('display', '');
			$('.one-day-card, .add-time-button-one-day').css('display', '');
		}

	});

	$('.table-selectable').on('click', function () {
		$('.table-selectable-box').css('display', 'none');
		box = $(this).find('.table-selectable-box');
		if (box.hasClass('open') === false) {
			box.css('display', 'block');
			setTimeout(function () {
				box.css('opacity', '1');
			}, 10);
		}
		$('.colors-box').css('opacity', '');
		setTimeout(function () {
			$('.colors-box').css('display', 'none');
		}, 200);
	});

	$('.table-selectable-box').on('mouseleave', function () {
		$(this).css('opacity', '');
		setTimeout(function () {
			$(this).css('display', 'none');
		}, 200);
	});

	$('.table-selectable-box div').on('click', function (e) {
		parent = $(this).parent();
		lastClass = parent.attr('class').split(' ').pop();
		table = $('[table=' + parent.attr('id') +']');
		margin = 'box-selected-' + $(this).attr('id');
		value = $(this).text();

		parent.find('div').removeClass('option-selected');
		$(this).addClass('option-selected');

		table.text(value);

		if (table.hasClass('table-light') === true) {
			table.append('<div class="list-indicator list-indicator-light list-indicator-table"></div>');
		}
		if (table.hasClass('table-dark') === true) {
			table.append('<div class="list-indicator list-indicator-dark list-indicator-table"></div>');
		}

		parent.css('opacity', '');
		setTimeout(function () {
			console.log(lastClass);
			parent.css('display', '')
				if (lastClass !== 'box-selected-top') {
					parent.removeClass(lastClass).addClass(margin);
				}
		}, 200);

		e.stopPropagation();

	});

});
