<?php 
  require "./php/header.php";
  require "./php/class.Finders.php";
	require "./php/class.EditArtForm.php";
	require "./php/class.AddArtForm.php";

	if(isset($_GET['art']))
	{
		$script_to_load= "<script type='text/javascript' src='/javascript/edit_art.js'></script>";
		$finder= new Finders();
		$art= $finder->find_art($_GET['art']);
		$art_form= new EditArtForm($art);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='/javascript/add_art.js'></script>";
		$art_form= new AddArtForm();		
	}
	$art_form->render();
	
	echo $script_to_load;
	require "./php/footer.php"; 
?>
