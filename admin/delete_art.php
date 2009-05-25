<?php
	require "../php/class.Art.php";
	$id= $_POST['art'];	
	$art= new Art($id);
	$art->deleteRecord($id);
?>
