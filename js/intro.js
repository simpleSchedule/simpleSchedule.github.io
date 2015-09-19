$(document).ready(function () {

	$('.arrow-button').click(function () {
		id = $(this).attr('id');
		margin = parseInt($('.intro-card-overflow').attr('id'));
		n = 100 / $('.intro-page-container').length;

		if (id === 'left') {
			margin = margin + n;
		} else {
			margin = margin - n;
		}

		console.log(margin);

		if (margin !== 0 || margin !== -0) {
			$('.left-arrow .arrow-button').css('display', 'block').css('pointer-events', 'auto');
			setTimeout(function () {
				$('.left-arrow .arrow-button').css('opacity', '1');
			}, 1);
		} else {
			$('.left-arrow .arrow-button').css('opacity', '').css('pointer-events', 'none');
			setTimeout(function () {
				$('.left-arrow .arrow-button').css('display', 'none');
			}, 200);
		}

		if (margin === (-n * ($('.intro-page-container').length - 1))) {
			$('.right-arrow .arrow-button').css('opacity', '0').css('pointer-events', 'none');
			setTimeout(function () {
				$('.right-arrow .arrow-button').css('display', 'none');
			}, 200);
		} else {
			if ($('.right-arrow .arrow-button').css('opacity') === '0') {
				$('.right-arrow .arrow-button').css('display', 'block').css('pointer-events', 'auto');
				setTimeout(function () {
					$('.right-arrow .arrow-button').css('opacity', '');
				}, 200);
			}
		}

		$('.intro-card-overflow').attr('id', margin);
		$('.intro-card-overflow').css('transform', 'translateX(' + margin + '%)');
		bubbleID = margin / n * -1;
		if (bubbleID < 1) {
			bubbleID = 0;
		}
		pageID = bubbleID + 1;
		console.log(bubbleID);
		$('.intro-page').css('opacity', '0');
		setTimeout(function () {
					$('.intro-page-' + pageID).css('opacity', '1');
				}, 1);
		$('.indicator-bubble').removeClass('indicator-bubble-active');
		$('.bubble-' + bubbleID).addClass('indicator-bubble-active');
	});

});
