<?php
	require "./php/class.Artists.php";
	$id= $_POST['artist'];	
	$artist= new Artists($id);
	$artist->deleteRecord($id);
?>
