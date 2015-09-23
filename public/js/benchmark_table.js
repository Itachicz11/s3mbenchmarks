
jQuery(document).ready(function($) {

	var dataInput = $('input[name="data"]').val();
	if ( isEmpty(dataInput) === false )  {

		var data = JSON.parse(dataInput);

		$('.page-rank-input').each(function(index, el) {
			$(this).val(data[index]);			
		});
	}

	
	$('.save-benchmark').click(function(event) {
		event.preventDefault();

		var dataArr = [];
		$('.benchmark-row').each(function(index, el) {

			var pageRank = $(el).find('.page-rank-input').val();

			dataArr.push(pageRank);
		});


		if ( isEmpty(dataArr) === false ) {
			$('input[name="benchmark_data"]').val( JSON.stringify(dataArr) );
		}

		$('.benchmark-form').submit();

	});



});