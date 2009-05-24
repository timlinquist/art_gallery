<?php
	require './php/class.Search.php';
	echo "<script type='text/javascript' src='./javascript/art_search.js'></script>";
	$search= new Search();
	$search->render_form();
?>