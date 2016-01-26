jQuery(document).ready(function($) {

  $('#companies-tabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
  });

  $('#first_compare').select2();
  $('#second_compare').select2();


  $('#rootwizard').bootstrapWizard({
    tabClass: 'form-wizard',
    onNext: function(tab, navigation, index) {
      var $valid = $(".steps-form").valid();

      if ( index === 2 ) {
        if ( $('input[name="keyword[]"]').length === 0 ) { $valid = false; }
      }
      
      if(!$valid) {
        return false;
      }
      else{
        $('#rootwizard').find('.form-wizard').children('li').eq(index-1).addClass('complete');
        $('#rootwizard').find('.form-wizard').children('li').eq(index-1).find('.step').html('<i class="fa fa-check"></i>'); 
      }
    }
  });


  //Date Pickers
  $('.benchmark-date').datepicker({
      autoclose: true,
      todayHighlight: true
   });
   

  $('.update-keyword').click(function(event) {
    event.preventDefault();
    var keywordId = $(this).attr('href');

    $('#keyword-update-bar').toggleClass('active');
    $('.update-keyword').attr('action', keywordId);


  });



});
