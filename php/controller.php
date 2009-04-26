<?php
foreach( $_POST as $key => $value ) {
  $_POST[$key] = mysql_real_escape_string(trim($value));
}

switch($_POST['action']) 
{
 	case "edit_artist":
	break;
}
?>