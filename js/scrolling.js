$(document).ready(function () {

	function cardScrolled (object) {
		if (object.scrollTop() !== 0) {
			if (object.hasClass('z2') !== true) {
				object.prev().addClass('z2');	
			}
		} else {
			object.prev().removeClass('z2');
		}
	}

	
	var cardTimer;
	$('.card-container').scroll(function() {
		object = $(this);
    clearTimeout(cardTimer);
	cardTimer = setTimeout(cardScrolled(object), 300);
});

});
