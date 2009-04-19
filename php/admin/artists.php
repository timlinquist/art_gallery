<?php
	require( "../class.ArtistFinders.php" );
	$artist_finder= new ArtistFinders();
	$artists= $artist_finder->all_artists();

	if( count($artists) > 0 )
	{
		require( "../class.ArtistDisplay.php" );		
		$artist_display= new ArtistDisplay();		
		$artist_display->display_artists( $artists );
	}
	else
	{
		echo "<p>No artists are listed at this time.";		
	}
?>

<p>Testing</p>
