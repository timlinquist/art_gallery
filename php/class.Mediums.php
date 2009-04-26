<?php
require_once( "db_connect.php" );

class Mediums {

    var $id;
    var $name;

    function __construct($attributes = NULL)
    {
			switch( gettype($attributes) )
			{
				case "array":
					foreach($attributes as $key => $value) 
					{
						$this->$key= mysql_real_escape_string(trim($value));
					}
				break;

				case "integer":
					$id= $attribute;
					$this->load($id);
				break;

				default:
					$this->id = NULL;
			}
    }

    function load( $id )
    {
        $query = "SELECT * FROM mediums WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );
				foreach($row as $key => $value) 
				{
					$this->$key = $value;
				}
    }

    function get_id()
    {
        return $this->id;
    }

    function set_id( $val )
    {
        $this->id = $val;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_name( $val )
    {
        $this->name = $val;
    }


    function update()
    {
        if( $this->id != null && $this->id != "null" )
            $this->updateRecord();
        else
            $this->insertRecord();
    }

    function insertRecord()
    {
        $query = 'INSERT INTO mediums ( id, name ) VALUES ( 0, "%s" )';
        $query = sprintf( $query, $this->name );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE mediums SET name="%s" WHERE id = %s';
        $query = sprintf( $query, $this->name, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM mediums WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM mediums LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM mediums";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

?>