<?php 
  require "./php/header.php";
  require "./php/class.Finders.php";
	require "./php/class.EditMediumForm.php";
	require "./php/class.AddMediumForm.php";

	if(isset($_GET['medium']))
	{
		$script_to_load= "<script type='text/javascript' src='./javascript/edit_medium.js'></script>";
		$finder= new Finders();
		$medium= $finder->find_medium($_GET['medium']);
		$medium_form= new EditMediumForm($medium);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='./javascript/add_medium.js'></script>";
		$medium_form= new AddMediumForm();		
	}
	$medium_form->render();
	
	echo $script_to_load;
	require "./php/footer.php"; 
?>
