<?php 
  require "admin_header.php";
  require "../php/class.Finders.php";
	require "../php/class.EditCategoryForm.php";
	require "../php/class.AddCategoryForm.php";

	if(isset($_GET['category']))
	{
		$script_to_load= "<script type='text/javascript' src='../javascript/edit_category.js'></script>";
		$finder= new Finders();
		$category= $finder->find_category($_GET['category']);
		$category_form= new EditCategoryForm($category);
	}
	else
	{
		$script_to_load= "<script type='text/javascript' src='../javascript/add_category.js'></script>";
		$category_form= new AddCategoryForm();		
	}
	
	echo "<a class='button' href='categories.php' alt='view categories'>View categories</a>";
	$category_form->render();
	
	echo $script_to_load;
	require "admin_footer.php"; 
?>
