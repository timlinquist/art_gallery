/**
 * matches US phone number format 
 * to be used with jQuery Masked Input Plugin
 * http://digitalbush.com/projects/masked-input-plugin/
 * (212) 999-2345 x_____
 */
jQuery.validator.addMethod("phone", function(phone_number, element) {
	return this.optional(element) || /^\([0-9]{3}\)\s[0-9]{3}-[0-9]{4}(?:\sx[0-9_]{0,5}){0,1}$/.test(phone_number);
}, "Please enter a valid phone number");
jQuery.validator.addMethod("zip_code", function(zip_code, element) {
  return this.optional(element) || /^[0-9]{5}(?:-[0-9_]{4})?$/.test(zip_code);
}, "Please enter a valid zip code");