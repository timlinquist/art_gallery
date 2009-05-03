<?php
require_once( "db_connect.php" );

class Artists {
    var $id;
    var $name;
    var $biography;
    var $phone;
    var $email;
    var $photo_file;
		
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
				case "string":
				case "integer":
					$id= mysql_real_escape_string(trim($attributes));
					$this->load($id);
				break;

				default:
					$this->id = NULL;
			}
    }

    function load( $id )
    {
        $query = "SELECT * FROM artists WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );
				if($row)
				{
					foreach($row as $key => $value) 
					{
						$this->$key = $value;
					}
					return;		
				}
				echo "<div>No artist found.</div>";
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

    function get_biography()
    {
        return $this->biography;
    }

    function set_biography( $val )
    {
        $this->biography = $val;
    }

    function get_phone()
    {
        return $this->phone;
    }

    function set_phone( $val )
    {
        $this->phone = $val;
    }

    function get_email()
    {
        return $this->email;
    }

    function set_email( $val )
    {
        $this->email = $val;
    }

    function get_photo_file()
    {
        return $this->photo_file;
    }

    function set_photo_file( $val )
    {
        $this->photo_file = $val;
    }


    function update()
    {
        if ( $this->id == null || $this->id == "null" || $this->id=="" )
					{
						$this->insertRecord();
					}
        else
        	{	
						$this->updateRecord();
					}
    }

    function insertRecord()
    {
        $query = 'INSERT INTO artists ( id, name, biography, phone, email, photo_file ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->name, $this->biography, $this->phone, $this->email, $this->photo_file );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

		function set_properties_via_post($post_array)
		{	
			$this->set_name($post_array['name']);
			$this->set_biography($post_array['biography']);
			$this->set_phone($post_array['phone']);
			$this->set_email($post_array['email']);
			$this->set_photo_file($post_array['photo_file']);
		}

    function updateRecord()
    {
        $query = 'UPDATE artists SET name="%s", biography="%s", phone="%s", email="%s", photo_file="%s" WHERE id = %s';
        $query = sprintf( $query, $this->name, $this->biography, $this->phone, $this->email, $this->photo_file, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
				$id= mysql_real_escape_string($id);
        $query = "DELETE FROM artists WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM artists LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM artists";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

?>