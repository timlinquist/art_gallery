function unbind_selects_change_event() {
	//unbind to avoid exponential request as dom is updated
	$('select').unbind('change');
}
function unbind_search_submit() { $("#art_search").unbind('submit'); }

function process_response(response){
	unbind_selects_change_event();
	chopped_response= response.split("|");
	$('#'+chopped_response[0]+'_select_wrapper').html(chopped_response[1]);
	$('#'+chopped_response[2]+'_select_wrapper').html(chopped_response[3]);
	bind_change_events();
}

function reset_form_click() {
	$('#reset_form').click(function() {
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: "reset="+true,
		   success: function(response){
				$('#search_results').html('');
				unbind_selects_change_event();
				unbind_search_submit();
				reset_form(response);
				bind_change_events();
				bind_search_submit();
		   }
		 });		
	});
}

function reset_form(response){
	$("#art_search_container").html(response)
}

function bind_search_submit() {	
	$("#art_search").ajaxForm(
		{
	    beforeSubmit:  function(){ disable_form(); return true;}, 
	    success: function(response){
				$('#search_results').html(response);
	    	enable_form();
			},
			error: function(){ enable_form(); }
		});
}

function bind_change_events() {	
	$('#category').change(function() {
		category_id= $(this).val();
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: "category_id="+category_id,
		   success: function(response){
				process_response(response);
		   }
		 });		
	});
	$('#medium').change(function() {
		medium_id= $(this).val();
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: "medium_id="+medium_id,
		   success: function(response){
				process_response(response);
		   }
		 });		
	});
	$('#artist').change(function() {
		artist_id= $(this).val();
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: "artist_id="+artist_id,
		   success: function(response){
				process_response(response);
		   }
		 });		
	});	
}

