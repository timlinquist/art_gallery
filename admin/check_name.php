<?php
	require_once '../php/db_connect.php';
	
	function validate_name_for_uniqueness()
	{
    $id = (isset($_POST['id'])) ? mysql_real_escape_string(trim($_POST['id'])) : 0;
    $edit_mode = (isset($_POST['edit_mode'])) ? mysql_real_escape_string(trim($_POST['edit_mode'])) : false;
		$table_name= mysql_real_escape_string(trim($_POST['table_name']));
		$name= mysql_real_escape_string(trim($_POST['name']));
    
    if( $edit_mode ) {
      validate_name_for_edit($table_name, $id, $name);
    }
    else {
      validate_name_for_add($table_name, $name);
    }
		
	}

  function validate_name_for_edit($table_name, $id, $name) {
		//When in edit_mode if name matches find_by_id
		$query_id = "SELECT name FROM $table_name WHERE id= $id";
		$result_id= mysql_query( $query_id ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query_id );
		$row_id = mysql_fetch_assoc( $result_id );

    $query_name = "SELECT COUNT(id) AS name_count FROM $table_name WHERE name='$name'";
		$result_name= mysql_query( $query_name ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query_name );
		$row_name = mysql_fetch_assoc( $result_name );

    $original_name = $row_id['name'] == $name;
    $name_is_unique = $row_name['name_count'] == 0;
		
		echo ($original_name || $name_is_unique) ? "true" : "false";
  }

  function validate_name_for_add($table_name, $name) {
		//When in edit_mode if name matches find_by_id
		$query = "SELECT COUNT(ID) AS name_count FROM $table_name where name= '$name'";
		$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
		$row = mysql_fetch_assoc( $result );
		
		$name_is_unique= ($row['name_count'] == '0' || $row['name_count'] == 0) ? 'true' : 'false';
		echo $name_is_unique;
  }
	
	switch( $_POST['table_name'] )
	{
		case 'art':
			validate_name_for_uniqueness();
		break;                         
		case 'artists':                
			validate_name_for_uniqueness();
		break;                         
		case 'categories':             
			validate_name_for_uniqueness();
		break;                         
		case 'mediums':                
			validate_name_for_uniqueness();
		break;
	}
?>