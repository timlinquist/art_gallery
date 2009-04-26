<?php
	require( "../php/class.ArtistFinders.php" );
	$artist_finder= new ArtistFinders();
	$artist= $artist_finder->find_artist($_GET['artist']);
	echo $artist->get_name();
?>