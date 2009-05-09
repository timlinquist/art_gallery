<?php 
  require "./php/header.php";
  require "./php/class.ArtistFinders.php";
	require "./php/class.ArtistForm.php";
	if($_GET['artist'] != '')
	{
		$script_to_load= "<script type='text/javascript' src='/javascript/edit_artist.js'></script>";
		$artist_finder= new ArtistFinders();
		$artist= $artist_finder->find_artist($_GET['artist']);
		$artist_form= new ArtistForm($artist, false);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='/javascript/add_artist.js'></script>";
		$artist_form= new ArtistForm();		
	}
	$artist_form->render();
	
	echo $script_to_load;
	echo "<script type='text/javascript' src='/javascript/form.js'></script>";
	require "./php/footer.php"; 
?>
