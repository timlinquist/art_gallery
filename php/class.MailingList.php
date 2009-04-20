<?php
require_once( "db_connect.php" );

class MailingList {

    var $id;
    var $artist_id;
    var $medium_id;
    var $category_id;
    var $everything;
    var $name;
    var $email;

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
        $query = "SELECT * FROM mailing_list WHERE id = " . $id;
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

    function get_artist_id()
    {
        return $this->artist_id;
    }

    function set_artist_id( $val )
    {
        $this->artist_id = $val;
    }

    function get_medium_id()
    {
        return $this->medium_id;
    }

    function set_medium_id( $val )
    {
        $this->medium_id = $val;
    }

    function get_category_id()
    {
        return $this->category_id;
    }

    function set_category_id( $val )
    {
        $this->category_id = $val;
    }

    function get_everything()
    {
        return $this->everything;
    }

    function set_everything( $val )
    {
        $this->everything = $val;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_name( $val )
    {
        $this->name = $val;
    }

    function get_email()
    {
        return $this->email;
    }

    function set_email( $val )
    {
        $this->email = $val;
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
        $query = 'INSERT INTO mailing_list ( id, artist_id, medium_id, category_id, everything, name, email ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->artist_id, $this->medium_id, $this->category_id, $this->everything, $this->name, $this->email );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE mailing_list SET artist_id="%s", medium_id="%s", category_id="%s", everything="%s", name="%s", email="%s" WHERE id = %s';
        $query = sprintf( $query, $this->artist_id, $this->medium_id, $this->category_id, $this->everything, $this->name, $this->email, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM mailing_list WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM mailing_list LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM mailing_list";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

?>