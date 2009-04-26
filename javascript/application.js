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
