<?php
require_once( "db_connect.php" );

class Artists {

    var $id;
    var $photo_id;
    var $name;
    var $biography;
    var $phone;
    var $email;

    function Artists()
    {
        $this->id = null;
    }

    function load( $id )
    {
        $query = "SELECT * FROM artists WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );

        $this->id = $row['id'];
        $this->photo_id = $row['photo_id'];
        $this->name = $row['name'];
        $this->biography = $row['biography'];
        $this->phone = $row['phone'];
        $this->email = $row['email'];
    }

    function get_id()
    {
        return $this->id;
    }

    function set_id( $val )
    {
        $this->id = $val;
    }

    function get_photo_id()
    {
        return $this->photo_id;
    }

    function set_photo_id( $val )
    {
        $this->photo_id = $val;
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


    function update()
    {
        if( $this->id != null && $this->id != "null" )
            $this->updateRecord();
        else
            $this->insertRecord();
    }

    function insertRecord()
    {
        $query = 'INSERT INTO artists ( id, photo_id, name, biography, phone, email ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->photo_id, $this->name, $this->biography, $this->phone, $this->email );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE artists SET photo_id="%s", name="%s", biography="%s", phone="%s", email="%s" WHERE id = %s';
        $query = sprintf( $query, $this->photo_id, $this->name, $this->biography, $this->phone, $this->email, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
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