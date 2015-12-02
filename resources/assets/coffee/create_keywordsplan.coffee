# $(".keywords-plan-form").submit (event) ->
#   event.preventDefault()

#   formURL = $(this).attr("action")

#   $.ajax
#     url: formURL
#     type: "POST"
#     data: $(this).serialize()
#     success: (data) ->
#       console.log(data);
#       $(".form-wrapper").slideUp 300, ->
#         $(this).html ""
#         $(".success-wrapper").removeClass "hidden"


#     error: (data) ->
#       errors = undefined
#       errors = $.parseJSON(data.responseText)
#       console.log(errors);
#       $.each errors, (index, value) ->
#         $(".alert.hidden").removeClass("hidden").find("ul").append "<li>" + value + "</li>"
