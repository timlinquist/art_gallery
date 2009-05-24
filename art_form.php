<?php 
  require "./php/header.php";
  require "./php/class.Finders.php";
	require "./php/class.EditArtForm.php";
	require "./php/class.AddArtForm.php";

	if(isset($_GET['art']))
	{
		$scripts_to_load= "<script type='text/javascript' src='/javascript/edit_art.js'></script>";
		$finder= new Finders();
		$art= $finder->find_art($_GET['art']);
		$art_form= new EditArtForm($art);
	}
	else
	{
		$scripts_to_load  = "<script type='text/javascript' src='/javascript/add_art.js'></script>";
		$art_form= new AddArtForm();		
	}
	echo "<a href='art.php' alt='view art'>View art</a>";
	$art_form->render();
	include "photo_upload_form.php";
	$scripts_to_load .= "<script type='text/javascript' src='/javascript/one_click_upload_for_object.js'></script>";
	
	echo $scripts_to_load;
	require "./php/footer.php"; 
?>
