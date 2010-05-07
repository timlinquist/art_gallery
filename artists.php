<?php 
  require "./php/header.php";
	require "./php/class.Finders.php";

	$finder= new Finders();
	$artists= $finder->all_artists();
  $num_artists = count($artists);

	if( $num_artists > 0 )
	{
	  $num_left = ceil($num_artists/2);
	  $num_right = $num_artists - $num_left;
		include "./php/class.ArtistDisplay.php";		
		$artist_display= new ArtistDisplay();
    $left_output = "";
    $right_output = "";
    foreach( $artists as $artist ) {
      if( $num_left > 0 ) {
			  $left_output .= $artist_display->get_artist_link_in_li( $artist );
        $num_left--;
      }
      else {
			  $right_output .= $artist_display->get_artist_link_in_li( $artist );
      }
    }
    echo "<div id=\"artist_bio_photo\"><img alt='' src='' /></div>\n";
    echo "<div id=\"artist_list_left\">\n<ul>\n" . $left_output . "</ul></div>\n";
    echo "<div id=\"artist_list_right\">\n<ul>\n" . $right_output . "</ul></div>\n";
	}
	else
	{
		echo "<p>No artists are listed at this time.</p>";		
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$("a.show_hide_link").click( function() {
			id_parts = this.id.split('_');
			artist_element_id = "p#artist_" + id_parts[1] + "_" + id_parts[2];
			$(artist_element_id).toggle('slow');
		});
		$("a.artist").mouseover( function() {
			id_parts = this.id.split('_');
			artist_thumb_path_id = "artist_thumbnail_path_"+id_parts[1];
			thumbnail = $("span#"+artist_thumb_path_id).html();
			$("div#artist_bio_photo img").attr("src", thumbnail);
		});
	});
</script>

<?php require "./php/footer.php"; ?>
