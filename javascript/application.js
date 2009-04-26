jQuery.fn.blindFadeToggle = function(speed, easing, callback) {
  return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
}

function flash_notice_message(msg){
	console.log("success notice message");
	flash_message("notice", msg);
}
function flash_error_message(msg){
	flash_message("error", msg);
}

function flash_message(class_to_add, msg) {
  $("#flash").html("")
	.removeClass("error notice")
  .addClass(class_to_add)
  .html(msg)
  .animate({opacity: 1.0}, 5.0)
  .blindFadeToggle(2500);	
}

function delete_artists() {
	$(".delete_artist a").click(function(){
		chopped_deleted_artist_id= $(this)[0].id.split("_");
		var deleted_artist_id= chopped_deleted_artist_id[ chopped_deleted_artist_id.length-1 ];	
		$.ajax({
		  type: "POST",
		  url: "delete_artist.php?artist="+deleted_artist_id,
			success: function(){
				$("#artist_"+deleted_artist_id).remove();
				flash_notice_message("Artist successfully deleted");
			},
			error: function(){
				flash_error_message("Unable to delete artist.  Please try again");
			}
		});
		return false;
	});
}
