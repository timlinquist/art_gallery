$(document).ready(function() {
  $('input#phone').mask("(999) 999-9999? x99999");
  $('input#zip_code').mask("99999?-9999");
  select_first_field();
  // create option object for the ajaxSubmit call 
  var ajaxsubmit_options = {
    beforeSubmit:  function(){ disable_form(); return true;},     
    success: function(){
    	enable_form("#main_form");
			flash_notice_message("Artist successfully updated.");
		},
		error: function(){
			enable_form();
			flash_error_message("Unable to update artist. Please correct any errors and attempt to update the artist again.");
		}
  }
  
	// validate signup form on keyup and submit
	var validator = $("#main_form").validate({
		rules: {
			name: {
			  required: true,
			  minlength: 2,
				remote: {
	        url: "check_name.php",
	        type: "post",
	        data: {
						table_name: "artists",
						edit_mode: "true",
	          name: function() { return $("#name").val();},
	          id: function() { return $("#id").val();}
	        }
	      }
			},
			biography: {
			  required: true
			},			
      phone: {
        required: true,
        phone: true
      },
			email: {
				required: true,
				email: true
			}
		},
		messages: {
			name: {
				name: "Enter the name",
				minlength: "Invalid name",
				remote: "Please enter a unique name."
			},
			biography: {
				required: "Enter the biography"
			},
			phone: {
				required: "Enter the phone number",
			  phone: "Invalid phone number"
			},
			email: {
				required: "Enter the email address",
				email: "Invalid email address"
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
