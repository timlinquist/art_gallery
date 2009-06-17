jQuery.fn.blindFadeToggle = function(speed, easing, callback) {
  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
}

function lightbox_photos() {
	$('.lb_photo_wrapper a').lightBox();
}

function flash_notice_message(msg){
	flash_message("notice", msg);
}
function flash_error_message(msg){
	flash_message("error", msg);
}
function flash_message(class_to_add, msg) {
  $("div.flash").html("")
	.removeClass("error notice")
  .addClass(class_to_add)
  .html(msg)
  .animate({opacity: 1.0}, 5000)
  .blindFadeToggle(1000);	
}

function delete_objects(object_name) 
{	
	delete_msg= "Are you sure you want to delete this "+object_name+"?";
	click_selector= ".delete_"+object_name+" a";
	success_msg= "The "+object_name+" was successfully deleted";
	error_msg= "Unable to delete the "+object_name+". Please try again";
	
	$(click_selector).click(function(){
		delete_accepted = confirm(delete_msg);
		if(delete_accepted)
		{
			chopped_deleted_object_id= $(this)[0].id.split("_");
			var deleted_object_id= chopped_deleted_object_id[ chopped_deleted_object_id.length-1 ];	
			$.ajax({
			  type: "POST",
			  url: "delete_"+object_name+".php",
			  data: object_name+"="+deleted_object_id,
				success: function(){
					$("#"+object_name+"_"+deleted_object_id).remove();
					flash_notice_message( success_msg );
				},
				error: function(){
					flash_error_message( error_msg );
				}
			});
		}
		return false;			
	});
}
