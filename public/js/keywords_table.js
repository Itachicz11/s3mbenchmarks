
// Display already created keywords and page ranks when the validation failes
var dataInput = $('input[name="keywords"]').val();
if (dataInput !== "{}" && dataInput !== "" )  {

	var data = JSON.parse(dataInput);

	$.each(data, function(index, val) {
		$('.keywords-table').append( rowHtml(index, val) );
	});	

}

addKeyword();

saveKeywordsPlan();

// Removing keyword
$('.keywords-table').on('click', '.remove-keyword', function(event) {
	event.preventDefault();
	$(this).parents("tr").remove();
});


// Add keyword functionality
function addKeyword() {
	$('.add-keyword').click(function(event) {

		var rowCopy = $('.keyword-copy-row').clone();
		var keyword = $('.keyword-input').val();
		var city = $('.city-select').val();

		$(rowCopy).attr('class', 'keyword-row');
		$(rowCopy).find('.keyword').text(keyword);
		$(rowCopy).find('.city').text(city);
		$(rowCopy).appendTo('.keywords-table tbody');

		$('.keyword-input').focus().val("");
	});
}


// Shorthand for HTML string
function rowHtml(keyword, city) {
	var htmlString = '<tr class="keyword-row">'+
	'<td class="keyword">'+keyword+'</td>'+
	'<td class="city">'+city+'</td>'+
	'<td class="action"><input type="button" class="btn btn-danger remove-keyword" value="Remove"></td>'+
	'</tr>';

	return htmlString;
}


// Before submiting the form, creates JSON array that sendes to input[name="data"]
function saveKeywordsPlan() {
	$('.save-plan').click(function(event) {
		event.preventDefault();

		var dataArr = {};
		$('.keyword-row').each(function(index, el) {

			var keyWord = $(el).find('.keyword').text();
			var pageRank = $(el).find('.city').text();

			dataArr[keyWord] = pageRank;
		});

		if ( isEmpty(dataArr) === false ) {
			$('input[name="keywords"]').val( JSON.stringify(dataArr) );
		}


		$('.keywords-plan-form').submit();
	});
}

