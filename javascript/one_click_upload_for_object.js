//show and hide the loading message
function loader(msg, show){ 
	(show) ? $('#loader').show() : $('#loader').hide(); 		
}

$(document).ready(function () {
		$('#loader').hide();
		var myUpload = $('#upload_link').upload({
		   name: 'photo_upload',
		   action: '../php/controller.php',
		   enctype: 'multipart/form-data',
		   params: {action:'upload_photo'},
		   autoSubmit: true,
		   onSubmit: function() {
					loader(true);
		   },
		   onComplete: function(response) {
		   		loader(false);
					response= response.split("|");
					responseType= response[0];
		
					if(responseType=="success"){
						uploaded_thumbnail= "<img src='" + response[1] + "' />";
						uploaded_img= response[2];
						$('#uploaded_image').html(uploaded_thumbnail);
						$('#photo_file').val(uploaded_img);
					}else{
						$('#upload_status').show().html('<p>Unable to upload photo.  Photo files must be of type jpeg, jpg, png, or gif.  They must also be less than 1megabyte in size.</p>');
						$('#uploaded_image').html('');
					}
		   }
		});
	});
