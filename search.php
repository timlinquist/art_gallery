<?php
	require './php/class.ArtSearchForm.php';
	echo "<script type='text/javascript' src='./javascript/art_search.js'></script>";
	$search_form= new ArtSearchForm();
	$search_form->render_form();
?>