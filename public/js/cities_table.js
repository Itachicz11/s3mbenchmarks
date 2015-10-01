
addCity();

citiesSelect();

// Removing keyword
$('.cities-table').on('click', '.remove-city', function(event) {
	event.preventDefault();
	$(this).parents("tr").remove();
});


// Add keyword functionality
function addCity() {
	var i = 0;
	$('.add-city').click(function(event) {
		var rowCopy = $('.city-copy-row').clone();
		var city = $('.city-input').val();

		$(rowCopy).attr('class', 'city-row').find('.city').text(city);
		$(rowCopy).find('input[type="text"]').attr('name', 'city['+i+']').val(city);
		$(rowCopy).appendTo('.cities-table tbody');

		$('.city-input').focus().val("");

		i++;
	});
}


// Shorthand for HTML string
function rowHtml(city, index) {
	var htmlString = '<tr class="city-row">'+
	'<td class="city">'+city+'</td>'+
	'<td class="hidden"><input name="city['+index+']" type="text"></td>'+
	'<td class="action"><input type="button" class="btn btn-danger remove-city" value="Remove"></td>'+
	'</tr>';

	return htmlString;
}


function citiesSelect() {
	$('.step-cities').click(function(event) {

		event.preventDefault();

		var citiesArr = [];
		$('.city-row').each(function(index, el) {

			var city = $(el).find('.city').text();

			citiesArr.push(city);
		});

		if ( isEmpty(citiesArr) === false) {
			$('input[name="cities"]').val( JSON.stringify(citiesArr) );
		}




		$(citiesArr).each(function(index, el) {
			$('.city-select').append($('<option>', { 
			    value: index,
			    text : el 
			}));
		});

	});
}
