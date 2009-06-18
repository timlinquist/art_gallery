<?php
	require_once "./php/header.php";
	require_once "./php/class.ArtistDisplay.php";
	require_once "./php/class.Artists.php";

	if(isset($_GET['id'])){
		$artist= new Artists($_GET['id']);
		$artist_display = new ArtistDisplay();
		
		if($artist->get_name() != '')
		{
      echo "<h1>".$artist->get_name()."</h1>\n<p>"
        . "<div class='art_link'><a class='button' href='artist_show.php?id=".$artist->get_id()."'>view art</a></div>"
        . $artist_display->display_artist_photo( $artist )
        . $artist->get_biography()
        . "</p>";
		}
		else{
			echo "No artist found for specified id";
		}
	}
	else{
		echo "No id was specified for the artist.";
	}

?>