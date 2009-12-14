function unbind_selects_change_event() {
	//unbind to avoid exponential request as dom is updated
	$('select').unbind('change');
}
function unbind_search_submit() { $("#art_search").unbind('submit'); }
function unbind_pagination_links() { $(".pagination").unbind('click'); }
function unbind_viewing_all(){ $("#view_all").unbind('click'); }
function reset_view_all(){ $('#viewing_all').val(''); }
function process_response(response){
	unbind_selects_change_event();
	chopped_response= response.split("|");
	if( chopped_response.length > 2 )
	{
		$('#'+chopped_response[0]+'_select_wrapper').html(chopped_response[1]);
		$('#'+chopped_response[2]+'_select_wrapper').html(chopped_response[3]);		
	}
	else{
		$('#'+chopped_response[0]+'_select_wrapper').html(chopped_response[1]);		
	}
	bind_change_events();
}

function bind_pagination() {
	$(".pagination").click(function(){
		data= $(this).attr('href') ;
		data= data.split("?");
		data= data[1];
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: data,
		   success: function(response){
				$('#search_results').html(response);
        jQuery("div.lb_photo_wrapper a").slimbox();
				bind_pagination();
				bind_viewing_all();
		   }
		 });	
		return false;	
	});
}

function reset_form_click() {
	$('#reset_form').ajaxForm({
	   success: function(response)
		 {
		 		$('#search_results').html('');
		 		unbind_selects_change_event();
		 		unbind_pagination_links();
		 		unbind_search_submit();
				unbind_viewing_all();
		 		reset_form(response);
		 		bind_change_events();
		 		bind_search_submit();
		 		bind_pagination();
				bind_viewing_all();
		 }  
	});		
}

function reset_form(response){
	$("#art_search_container").html(response)
}

function bind_viewing_all(){
	$('#view_all').click(function(){
		$('#viewing_all').val('viewing_all');
		$('#art_search').submit();
		return false;
	});
}

function bind_search_submit() {	
	$("#art_search").ajaxForm(
		{
	    beforeSubmit:  function(){ disable_form(); return true;}, 
	    success: function(response){
				$('#search_results').html(response);
				bind_pagination();
				bind_viewing_all();
				reset_view_all();
        jQuery("div.lb_photo_wrapper a").slimbox();
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
		category_id= $('#category').val()
		
		$.ajax({
		   type: "POST",
		   url: "./php/do_search.php",
		   data: "medium_id="+medium_id+"&category_id="+category_id,
		   success: function(response){
				process_response(response);
		   }
		 });		
	});
}

