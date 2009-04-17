<?php
require_once( "db_connect.php" );

class Art_photos {

    var $id;
    var $photo_id;
    var $art_id;

    function Art_photos()
    {
        $this->id = null;
    }

    function load( $id )
    {
        $query = "SELECT * FROM art_photos WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );

        $this->id = $row['id'];
        $this->photo_id = $row['photo_id'];
        $this->art_id = $row['art_id'];
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

    function get_art_id()
    {
        return $this->art_id;
    }

    function set_art_id( $val )
    {
        $this->art_id = $val;
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
        $query = 'INSERT INTO art_photos ( id, photo_id, art_id ) VALUES ( 0, "%s", "%s" )';
        $query = sprintf( $query, $this->photo_id, $this->art_id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE art_photos SET photo_id="%s", art_id="%s" WHERE id = %s';
        $query = sprintf( $query, $this->photo_id, $this->art_id, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM art_photos WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM art_photos LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM art_photos";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}


?>
