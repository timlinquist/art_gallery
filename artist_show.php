<?php
	require_once "./php/header.php";
	require_once "./php/class.Finders.php";
	require_once "./php/class.ArtDisplay.php";
	require_once "./php/class.ArtistDisplay.php";
	require_once "./php/class.Art.php";
	require_once "./php/class.Artists.php";

	if(isset($_GET['id'])){
		$artist= new Artists($_GET['id']);
		
		if($artist->get_name() != '')
		{
      echo "<h1>".$artist->get_name()."</h1>";
      echo "<div class='biography_link'><a class='button' href='artist_bio.php?id=".$artist->get_id()."'>biography</a></div>";
			echo "<div id='art_container'>";
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