<?php
	require('class.Artists.php');
	require('class.Categories.php');
	require('class.Mediums.php');
	require('class.Art.php');

	foreach( $_POST as $key => $value ) {
	  $_POST[$key] = mysql_real_escape_string(trim($value));
	}

	switch($_POST['action']) 
	{
	 	case "edit_artist":
			$artist= new Artists($_POST['id']);
			$artist->set_properties_via_post($_POST);
			$artist->updateRecord();
		break;
		case "add_artist":
			$artist= new Artists();
			$artist->set_properties_via_post($_POST);
			$artist->update();
		break;
		case "add_art":
			$art= new Art();
			$art->set_properties_via_post($_POST);
			$art->update();
		break;
		case "edit_art":
			$art= new Art($_POST['id']);
			$art->set_properties_via_post($_POST);
			$art->update();
		break;
		case "add_category":
			$category= new Categories();
			$category->set_properties_via_post($_POST);
			$category->update();
		break;
		case "edit_category":
			$category= new Categories($_POST['id']);
			$category->set_properties_via_post($_POST);
			$category->update();
		break;
		case "add_medium":
			$medium= new Mediums();
			$medium->set_properties_via_post($_POST);
			$medium->update();
		break;
		case "edit_medium":
			$medium= new Mediums($_POST['id']);
			$medium->set_properties_via_post($_POST);
			$medium->update();
		break;
	}
?>