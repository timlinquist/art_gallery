<?php
	require "./php/header.php";

	require './php/class.ArtSearchForm.php';
	echo "<script type='text/javascript' src='./javascript/art_search.js'></script>";
	$search_form= new ArtSearchForm();

	echo "<form action='./php/do_search.php' id='reset_form' method='post'>
					<input type='hidden' name='reset' id='reset' value='true' />
					<input type='submit' value='Reset Form' />
				</form>";
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