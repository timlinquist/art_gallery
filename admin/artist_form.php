<?php 
  require "admin_header.php";
  require "../php/class.Finders.php";
	require "../php/class.EditArtistForm.php";
	require "../php/class.AddArtistForm.php";

	if(isset($_GET['artist']))
	{
		$scripts_to_load= "<script type='text/javascript' src='../javascript/edit_artist.js'></script>";
		$finder= new Finders();
		$artist= $finder->find_artist($_GET['artist']);
		$artist_form= new EditArtistForm($artist);
	}
	else
	{
		$scripts_to_load  = "<script type='text/javascript' src='../javascript/add_artist.js'></script>";
		$artist_form= new AddArtistForm();		 
	}
	
	echo "<a href='artists.php' alt='view artists'>View artists</a>";
	$artist_form->render();
	include "photo_upload_form.php";
	$scripts_to_load .= "<script type='text/javascript' src='../javascript/one_click_upload_for_object.js'></script>";
	
	echo $scripts_to_load;
	require "admin_footer.php"; 
?>
