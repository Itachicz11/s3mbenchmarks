
// Display already created keywords and page ranks when the validation failes
var dataInput = $('input[name="cities"]').val();
if (dataInput !== "{}" && dataInput !== "" )  {

	var data = JSON.parse(dataInput);

	$.each(data, function(index, val) {
		$('.cities-table').append( rowHtml(val) );
	});	

}

addCity();

citiesSelect();

// Removing keyword
$('.cities-table').on('click', '.remove-city', function(event) {
	event.preventDefault();
	$(this).parents("tr").remove();
});


// Add keyword functionality
function addCity() {
	$('.add-city').click(function(event) {

		var rowCopy = $('.city-copy-row').clone();
		var city = $('.city-input').val();

		$(rowCopy).attr('class', 'city-row').find('.city').text(city);
		$(rowCopy).appendTo('.cities-table tbody');

		$('.city-input').focus().val("");
	});
}


// Shorthand for HTML string
function rowHtml(city) {
	var htmlString = '<tr class="city-row">'+
	'<td class="city">'+city+'</td>'+
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
			    value: el,
			    text : el 
			}));
		});

	});
}
