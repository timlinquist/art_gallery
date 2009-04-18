<?php
require_once( "db_connect.php" );

class Photos {

    var $id;
    var $thumb_path;
    var $full_size_path;

    function Photos($attributes = NULL)
    {
			switch( gettype($attributes) )
			{
				case "array":
					foreach($attributes as $key => $value) 
					{
						$this->$key= mysql_real_escape_string(trim($value));
					}
					$this->insertRecord();
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
        $query = "SELECT * FROM photos WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );

				foreach($row as $key => $value) 
				{
					$this->$key = $value;
				}

    }

		function to_s()
		{
			return $this->thumb_path . "<br />" . $this->full_size_path ;
		}

    function get_id()
    {
        return $this->id;
    }

    function set_id( $val )
    {
        $this->id = $val;
    }

    function get_thumb_path()
    {
        return $this->thumb_path;
    }

    function set_thumb_path( $val )
    {
        $this->thumb_path = $val;
    }

    function get_full_size_path()
    {
        return $this->full_size_path;
    }

    function set_full_size_path( $val )
    {
        $this->full_size_path = $val;
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
        $query = 'INSERT INTO photos ( id, thumb_path, full_size_path ) VALUES ( 0, "%s", "%s" )';
        $query = sprintf( $query, $this->thumb_path, $this->full_size_path );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE photos SET thumb_path="%s", full_size_path="%s" WHERE id = %s';
        $query = sprintf( $query, $this->thumb_path, $this->full_size_path, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM photos WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM photos LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM photos";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

?>