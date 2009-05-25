$(document).ready(function() {
  select_first_field();
  var ajaxsubmit_options = {
    beforeSubmit:  function(){ disable_form(); return true;},     
    success: function(){
    	enable_form("form");
			$("#main_form").resetForm();
			flash_notice_message("Medium successfully added.");
		},
		error: function(){
			enable_form();
			flash_error_message("Unable to add medium. Please correct any errors and attempt to add the medium again.");
		}
  }
  
	// validate signup form on keyup and submit
	var validator = $("form").validate({
		rules: {
			name: {
			  required: true,
			  minlength: 2
			}
		},
		messages: {
			name: {
				name: "Enter the name",
				minlength: "Invalid name"
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label){
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		},
		submitHandler: function() {
			$("form").ajaxSubmit(ajaxsubmit_options);
      return false;  //  return false to prevent standard browser submit
		}
	});
});
