
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

		$(rowCopy).attr('class', resourceName+'-row');
		$(rowCopy).appendTo('.'+resourceName+'-table tbody');
		$(rowCopy).find('input[type="text"]').attr('name', resourceName+'['+i+']').val(resource);

		$('.'+resourceName+'-input').focus().val("");
		i++;
	});
}

function removeRow(resourceName) {
	// Removing keyword
	$('.'+resourceName+'-table').on('click', '.remove-'+resourceName, function(event) {
		event.preventDefault();
		$(this).parents("tr").remove();
	});
}


