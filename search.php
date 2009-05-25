<?php
	require "./php/header.php";

	require './php/class.ArtSearchForm.php';
	echo "<script type='text/javascript' src='./javascript/art_search.js'></script>";
	$search_form= new ArtSearchForm();

	echo "<a href='#' id='reset_form'>Reset Form</a>";
	echo "<div id='art_search_container'>";
	$search_form->render_form();
	echo "</div>";
?>	

	<div id='search_results'></div>
	<script type='text/javascript'>
		$(document).ready(function() { bind_change_events(); reset_form_click(); bind_search_submit(); });
	</script>	

<?php	
	require "./php/footer.php";
?>