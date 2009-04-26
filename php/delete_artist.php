<?php
	require( "class.Artists.php" );
	$id= $_GET['artist'];	
	$artist= new Artists($id);
	$artist->deleteRecord($id);
?>
