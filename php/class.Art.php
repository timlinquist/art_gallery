<?php
require_once( "db_connect.php" );

class Art {

    var $id;
    var $artist_id;
    var $gallery_id;
    var $art_type_id;
    var $name;
    var $description;
    var $medium;
    var $price;

    function Art()
    {
        $this->id = null;
    }

    function load( $id )
    {
        $query = "SELECT * FROM art WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );

        $this->id = $row['id'];
        $this->artist_id = $row['artist_id'];
        $this->gallery_id = $row['gallery_id'];
        $this->art_type_id = $row['art_type_id'];
        $this->name = $row['name'];
        $this->description = $row['description'];
        $this->medium = $row['medium'];
        $this->price = $row['price'];
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

    function get_gallery_id()
    {
        return $this->gallery_id;
    }

    function set_gallery_id( $val )
    {
        $this->gallery_id = $val;
    }

    function get_art_type_id()
    {
        return $this->art_type_id;
    }

    function set_art_type_id( $val )
    {
        $this->art_type_id = $val;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_name( $val )
    {
        $this->name = $val;
    }

    function get_description()
    {
        return $this->description;
    }

    function set_description( $val )
    {
        $this->description = $val;
    }

    function get_medium()
    {
        return $this->medium;
    }

    function set_medium( $val )
    {
        $this->medium = $val;
    }

    function get_price()
    {
        return $this->price;
    }

    function set_price( $val )
    {
        $this->price = $val;
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
        $query = 'INSERT INTO art ( id, artist_id, gallery_id, art_type_id, name, description, medium, price ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->artist_id, $this->gallery_id, $this->art_type_id, $this->name, $this->description, $this->medium, $this->price );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE art SET artist_id="%s", gallery_id="%s", art_type_id="%s", name="%s", description="%s", medium="%s", price="%s" WHERE id = %s';
        $query = sprintf( $query, $this->artist_id, $this->gallery_id, $this->art_type_id, $this->name, $this->description, $this->medium, $this->price, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM art WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM art LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM art";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}


?>