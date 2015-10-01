jQuery(document).ready(function($) {


	$('.delete-benchmark').click(function(event) {
		event.preventDefault();
		var button = $(this);

		$.ajax({
			url: $(button).attr('href'),
			type: 'DELETE',
		})
		.done(function(data) {
			$(button).parents('tr').remove();
		})
		

	});


});