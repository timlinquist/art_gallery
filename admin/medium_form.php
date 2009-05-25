<?php 
  require "admin_header.php";
  require "../php/class.Finders.php";
	require "../php/class.EditMediumForm.php";
	require "../php/class.AddMediumForm.php";

	if(isset($_GET['medium']))
	{
		$script_to_load= "<script type='text/javascript' src='../javascript/edit_medium.js'></script>";
		$finder= new Finders();
		$medium= $finder->find_medium($_GET['medium']);
		$medium_form= new EditMediumForm($medium);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='../javascript/add_medium.js'></script>";
		$medium_form= new AddMediumForm();		
	}
	echo "<a href='mediums.php' alt='view mediums'>View mediums</a>";
	$medium_form->render();
	
	echo $script_to_load;
	require "admin_footer.php"; 
?>
