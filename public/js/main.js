

jQuery(document).ready(function($) {


	$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});


	var navListItems = $('ul.setup-panel li a'),
	    allWells = $('.setup-content');

	allWells.hide();

	navListItems.click(function(e)
	{
	    e.preventDefault();
	    var $target = $($(this).attr('href')),
	        $item = $(this).closest('li');
	    
	    if (!$item.hasClass('disabled')) {
	        navListItems.closest('li').removeClass('active');
	        $item.addClass('active');
	        allWells.hide();
	        $target.show();
	    }
	});
	
	$('ul.setup-panel li.active a').trigger('click');
	
	$('#activate-step-2').on('click', function(e) {
	    $('ul.setup-panel li:eq(1)').removeClass('disabled');
	    $('ul.setup-panel li a[href="#step-2"]').trigger('click');
	    $(this).remove();
	})  

	$('#activate-step-3').on('click', function(e) {
	    $('ul.setup-panel li:eq(2)').removeClass('disabled');
	    $('ul.setup-panel li a[href="#step-3"]').trigger('click');
	    $(this).remove();
	})


	$('.remove-plan').click(function(event) {
		alert('Are you sure?');
		event.preventDefault();

		var btn = $(this),
		planId = $(btn).data('plan'),
		token = $(btn).siblings('input[name="_token"]').val();

		$.ajax({
			url: '/laravel/public/keywordsplans/'+planId,
			type: 'DELETE',
			data: { _token: token }

		})
		.success(function() {
			$(btn).parents('tr').remove();
		});
	});
	
	$('.remove-benchmark').click(function(event) {
		alert('Are you sure?');
		event.preventDefault();

		var btn = $(this),
		benchmarkId = $(btn).data('benchmark'),
		token = $(btn).siblings('input[name="_token"]').val();

		$.ajax({
			url: '/laravel/public/benchmarks/'+benchmarkId,
			type: 'DELETE',
			data: { _token: token }

		})
		.success(function() {
			$(btn).parents('tr').remove();
		});

	});

	$('#compare-benchmarks').click(function(event) {
		var arr = [];

		$('input[type="checkbox"]:checked').each(function(index, el) {
			var inputVal = $(el).val()
			arr.push(inputVal);
		});

		$('.benchmarks-arr').val(JSON.stringify(arr));

	});


});

function isEmpty(obj) {

    // null and undefined are "empty"
    if (obj == null) return true;

    // Assume if it has a length property with a non-zero value
    // that that property is correct.
    if (obj.length > 0)    return false;
    if (obj.length === 0)  return true;

    // Otherwise, does it have any properties of its own?
    // Note that this doesn't handle
    // toString and valueOf enumeration bugs in IE < 9
    for (var key in obj) {
        if (hasOwnProperty.call(obj, key)) return false;
    }

    return true;
}
