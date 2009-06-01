$(document).ready(function() {
  select_first_field();
  // create option object for the ajaxSubmit call 
  var ajaxsubmit_options = {
    beforeSubmit:  function(){ disable_form(); return true;},     
    success: function(){
    	enable_form("form");
			flash_notice_message("Medium successfully updated.");
		},
		error: function(){
			enable_form();
			flash_error_message("Unable to update medium. Please correct any errors and attempt to update the medium again.");
		}
  }
  
	// validate signup form on keyup and submit
	var validator = $("form").validate({
		rules: {
			name: {
			  required: true,
			  minlength: 2,
				remote: {
	        url: "check_name.php",
	        type: "post",
	        data: {
						table_name: "mediums",
						edit_mode: "true",
	          name: function() { return $("#name").val();}
	        }
	      }
			}
		},
		messages: {
			name: {
				name: "Enter the name",
				minlength: "Invalid name",
				remote: "Please enter a unique name."
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
