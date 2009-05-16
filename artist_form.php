<?php 
  require "./php/header.php";
  require "./php/class.Finders.php";
	require "./php/class.EditArtistForm.php";
	require "./php/class.AddArtistForm.php";

	if(isset($_GET['artist']))
	{
		$script_to_load= "<script type='text/javascript' src='./javascript/edit_artist.js'></script>";
		$finder= new Finders();
		$artist= $finder->find_artist($_GET['artist']);
		$artist_form= new EditArtistForm($artist);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='./javascript/add_artist.js'></script>";
		$artist_form= new AddArtistForm();		
	}
	$artist_form->render();
	
	echo $script_to_load;
	require "./php/footer.php"; 
?>
