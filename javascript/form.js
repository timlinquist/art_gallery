//Loop through all inputs, select first one that is not hidden, and return out of function
function select_first_field(){ $(":text:first").select(); }
function disable_form() {
  $("fieldset input").attr("disabled", "disabled");
  $("fieldset select").attr("disabled", "disabled");
  $("fieldset textarea").attr("disabled", "disabled");
  $("fieldset input").attr("disabled", "disabled");
}

function enable_form() {
  $("fieldset input").removeAttr("disabled");
  $("fieldset select").removeAttr("disabled");
  $("fieldset textarea").removeAttr("disabled");
  $("fieldset input").removeAttr("disabled");
}

function hide_form(selector) { $(selector).hide(); }

