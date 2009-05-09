<?php 
  require "./php/header.php";
	require "./php/class.ArtistFinders.php";

	$artist_finder= new ArtistFinders();
	$artists= $artist_finder->all_artists();

	if( count($artists) > 0 )
	{
		include "./php/class.ArtistDisplay.php";		
		$artist_display= new ArtistDisplay(true);		
		$artist_display->display_artists( $artists );
	}
	else
	{
		echo "<p>No artists are listed at this time.</p>";		
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		delete_artists();
	});
</script>

<?php 
  require "./php/footer.php";
?>