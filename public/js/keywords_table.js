
// Display already created keywords and page ranks when the validation failes
addKeyword();

saveKeywordsPlan();

// Removing keyword
$('.keywords-table').on('click', '.remove-keyword', function(event) {
	event.preventDefault();
	$(this).parents("tr").remove();
});


// Add keyword functionality
function addKeyword() {
		var i = 0;
		$('.add-keyword').click(function(event) {

		var rowCopy = $('.keyword-copy-row').clone();
		var keyword = $('.keyword-input').val();


		$(rowCopy).attr('class', 'keyword-row');
		$(rowCopy).find('.keyword').text(keyword);
		$(rowCopy).appendTo('.keywords-table tbody');
		$(rowCopy).find('input[type="text"]').attr('name', 'keyword['+i+']').val(keyword);

		$('.keyword-input').focus().val("");

		i++;
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

