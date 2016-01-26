
// Display already created keywords and page ranks when the validation failes
addResource('keyword');
removeRow('keyword');

addResource('city');
removeRow('city');




// Add keyword functionality
function addResource(resourceName) {
	var i = $('.'+resourceName+'-row').length;
	$('.add-'+resourceName).click(function(event) {

		var rowCopy = $('.'+resourceName+'-copy-row').clone();
		var resource = $('.'+resourceName+'-input').val();

		$(rowCopy).attr('class', resourceName+'-row clearfix');
		$(rowCopy).appendTo('.'+resourceName+'-list');
		$(rowCopy).find('input[type="text"]').attr('name', resourceName+'[]').val(resource);

		$('.'+resourceName+'-input').focus().val("");
		i++;
	});
}

function removeRow(resourceName) {
	// Removing keyword
	$('.'+resourceName+'-list').on('click', '.remove-'+resourceName, function(event) {
		event.preventDefault();
		$(this).parents(".keyword-row").remove();
	});
}


