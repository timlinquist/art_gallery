<?php
	require('class.Artists.php');
	foreach( $_POST as $key => $value ) {
	  $_POST[$key] = mysql_real_escape_string(trim($value));
	}

	switch($_POST['action']) 
	{
	 	case "edit_artist":
			$artist= new Artists($_POST['id']);
			$artist->update_properties_via_post($_POST);
			$artist->updateRecord();
			
		break;
	}
?>