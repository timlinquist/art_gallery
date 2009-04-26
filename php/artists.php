<?php require("header.php") ?>

<?php
	require( "class.ArtistFinders.php" );
	$artist_finder= new ArtistFinders();
	$artists= $artist_finder->all_artists();

	if( count($artists) > 0 )
	{
		include( "class.ArtistDisplay.php" );		
		$artist_display= new ArtistDisplay(true);		
		$artist_display->display_artists( $artists );
	}
	else
	{
		echo "<p>No artists are listed at this time.</p>";		
	}
?>
<script type="text/javascript">
	$(".delete_artist a").click(function(){
		chopped_deleted_artist_id= $(this)[0].id.split("_");
		var deleted_artist_id= chopped_deleted_artist_id[ chopped_deleted_artist_id.length-1 ];	
		$.ajax({
		  type: "POST",
		  url: "delete_artist.php?artist="+deleted_artist_id,
			success: function(){
				$("#artist_"+deleted_artist_id).remove();
				flash_notice_message("Artist successfully deleted");
			},
			error: function(){
				flash_error_message("Unable to delete artist.  Please try again");
			}
		});
		return false;
	});
</script>

<?php require("footer.php") ?>
