$(document).ready(function () {
	$('form').submit(function(evt) {
		evt.preventDefault();
		var $searchField = $('#search');
		var $submitButton = $('#submit');

		$searchField.prop('disabled', true);
		$submitButton.attr('disabled', true).val('Searching.....');

		//Ajax part
		var flickerAPI = "https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
		var animal = $searchField.val();
		var flickrOptions = {
			tags: animal,
			format: "json"
		};
		function displayPhotos(data) {
			var photoHTML = '<ul>';
			$.each(data.items, function (i, photo) {
				photoHTML += '<li class="grid-25 tablet-grid-50">';
				photoHTML += '<a href="' + photo.link + '" class="image">';
				photoHTML += '<img src="' + photo.media.m + '"></a></li>';
			});
			photoHTML += '</ul>';
			$('#photos').html(photoHTML);
			$searchField.prop('disabled', false);
			$submitButton.attr('disabled', false).val('Search');
		}
		$.getJSON(flickerAPI, flickrOptions, displayPhotos);
	}); //end submit
}); //end ready


//old button click function
	// $(document).ready(function () {
	// 	$('button').click(function() {
	// 		$('button').removeClass('selected');
	// 		$(this).addClass('selected');

	// 		var flickerAPI = "https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
	// 		var animal = $(this).text();
	// 		var flickrOptions = {
	// 			tags: animal,
	// 			format: "json"
	// 		};
	// 		function displayPhotos(data) {
	// 			var photoHTML = '<ul>';
	// 			$.each(data.items, function (i, photo) {
	// 				photoHTML += '<li class="grid-25 tablet-grid-50">';
	// 				photoHTML += '<a href="' + photo.link + '" class="image">';
	// 				photoHTML += '<img src="' + photo.media.m + '"></a></li>';
	// 			});
	// 			photoHTML += '</ul>';
	// 			$('#photos').html(photoHTML);
	// 		}
	// 		$.getJSON(flickerAPI, flickrOptions, displayPhotos);
	// 	});
	// }); //end ready