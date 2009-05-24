$(document).ready(function() {
  select_first_field();
  // create option object for the ajaxSubmit call 
  var ajaxsubmit_options = {
    beforeSubmit:  function(){ disable_form(); return true;},     
    success: function(){
    	enable_form("#main_form");
			$("#main_form").resetForm();
			flash_notice_message("Art successfully added.");
		},
		error: function(){
			enable_form();
			flash_error_message("Unable to add art piece. Please correct any errors and attempt to add the art piece again.");
		}
  }
  
	// validate signup form on keyup and submit
	var validator = $("#main_form").validate({
		rules: {
			name: {
			  required: true,
			  minlength: 2
			},
			description: {
			  required: true
			}
		},
		messages: {
			name: {
				name: "Enter the name",
				minlength: "Invalid name"
			},
			description: {
				required: "Enter the description"
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label){
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		},
		submitHandler: function() {
			$("#main_form").ajaxSubmit(ajaxsubmit_options);
      return false;  //  return false to prevent standard browser submit
		}
	});
});
