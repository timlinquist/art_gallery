<?php
	require_once '../php/db_connect.php';
	
	function validate_name_for_uniqueness($table_name, $name)
	{
		$name= mysql_real_escape_string(trim($name));
		$table_name= mysql_real_escape_string(trim($table_name));
		
		//When in edit_mode if name matches find_by_id
		$query = "SELECT COUNT(ID) AS name_count FROM $table_name where name= '$name'";
		$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
		$row = mysql_fetch_assoc( $result );
		
		$name_is_unique= ($row['name_count'] == '0' || $row['name_count'] == 0) ? 'true' : 'false';
		echo $name_is_unique;
	}
	
	$table_name= $_POST['table_name'];
	$name= $_POST['name'];
	
	switch( $table_name )
	{
		case 'art':
			validate_name_for_uniqueness($table_name, $name);
		break;
		case 'artists':
			validate_name_for_uniqueness($table_name, $name);
		break;
		case 'categories':
			validate_name_for_uniqueness($table_name, $name);
		break;
		case 'mediums':
			validate_name_for_uniqueness($table_name, $name);
		break;
	}
?>