<?php
	require_once "./php/header.php";
	require_once "./php/class.Finders.php";
	require_once "./php/class.ArtDisplay.php";
	require_once "./php/class.ArtistDisplay.php";
	require_once "./php/class.Art.php";
	require_once "./php/class.Artists.php";

	echo "<div><a href='artists.php'>View Artists</a></div>";
	
	if(isset($_GET['id'])){
		$artist= new Artists($_GET['id']);
		
		if($artist->get_name() != '')
		{
			$artist_display= new ArtistDisplay();
			$artist_display->display_artist( $artist );
			
			echo "<div id='art_container'>Art: ";
				$finder = new Finders();
				$art= $finder->all_art_by_artist($artist->get_id());	
				if(count($art) > 0)
				{
					$art_display = new ArtDisplay();
					$art_display->display_art($art);			
				}
				else{
					echo "This artist does not have any art on display at this time.";
				}			
			echo "</div>";
		}
		else{
			echo "No artist found for specified id";
		}
	}
	else{
		echo "No id was specified for the artist.";
	}

?>