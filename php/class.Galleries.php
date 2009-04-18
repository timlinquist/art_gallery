<?php
require_once( "db_connect.php" );

class Galleries {
				
    var $id;
    var $name;
    var $phone;
    var $fax;
    var $street_address_1;
    var $street_address_2;
    var $city;
    var $state;
    var $zip_code;
    var $google_map_url;

    function Galleries()
    {
        $this->id = null;
    }

    function load( $id )
    {
        $query = "SELECT * FROM galleries WHERE id = " . $id;
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        $row = mysql_fetch_array( $result );

        $this->id = $row['id'];
        $this->name = $row['name'];
        $this->phone = $row['phone'];
        $this->fax = $row['fax'];
        $this->street_address_1 = $row['street_address_1'];
        $this->street_address_2 = $row['street_address_2'];
        $this->city = $row['city'];
        $this->state = $row['state'];
        $this->zip_code = $row['zip_code'];
        $this->google_map_url = $row['google_map_url'];
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

    function get_phone()
    {
        return $this->phone;
    }

    function set_phone( $val )
    {
        $this->phone = $val;
    }

    function get_fax()
    {
        return $this->fax;
    }

    function set_fax( $val )
    {
        $this->fax = $val;
    }

    function get_street_address_1()
    {
        return $this->street_address_1;
    }

    function set_street_address_1( $val )
    {
        $this->street_address_1 = $val;
    }

    function get_street_address_2()
    {
        return $this->street_address_2;
    }

    function set_street_address_2( $val )
    {
        $this->street_address_2 = $val;
    }

    function get_city()
    {
        return $this->city;
    }

    function set_city( $val )
    {
        $this->city = $val;
    }

    function get_state()
    {
        return $this->state;
    }

    function set_state( $val )
    {
        $this->state = $val;
    }

    function get_zip_code()
    {
        return $this->zip_code;
    }

    function set_zip_code( $val )
    {
        $this->zip_code = $val;
    }

    function get_google_map_url()
    {
        return $this->google_map_url;
    }

    function set_google_map_url( $val )
    {
        $this->google_map_url = $val;
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
        $query = 'INSERT INTO galleries ( id, name, phone, fax, street_address_1, street_address_2, city, state, zip_code, google_map_url ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->name, $this->phone, $this->fax, $this->street_address_1, $this->street_address_2, $this->city, $this->state, $this->zip_code, $this->google_map_url );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE galleries SET name="%s", phone="%s", fax="%s", street_address_1="%s", street_address_2="%s", city="%s", state="%s", zip_code="%s", google_map_url="%s" WHERE id = %s';
        $query = sprintf( $query, $this->name, $this->phone, $this->fax, $this->street_address_1, $this->street_address_2, $this->city, $this->state, $this->zip_code, $this->google_map_url, $this->id );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function deleteRecord( $id )
    {
        $query = "DELETE FROM galleries WHERE id = $id";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function get_num_rows()
    {
       $temp = mysql_query( "SELECT SQL_CALC_FOUND_ROWS * FROM galleries LIMIT 1" );
       $result = mysql_query( "SELECT FOUND_ROWS()" );
       $total = mysql_fetch_row( $result );
       return $total[0];
    }

    function get_ids()
    {
        $ids = array();
        $query = "SELECT id FROM galleries";
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
        while( $row = mysql_fetch_array( $result ) )
            $ids[] = $row['id'];
        return $ids;
    }
}

?>