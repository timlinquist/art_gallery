<?php
require_once( "db_connect.php" );

class Art {

    var $id;
    var $artist_id;
    var $category_id;
    var $medium_id;
    var $name;
    var $description;
    var $photo_file;
		var $gallery;
    var $price;
    var $status;
    var $paypal_link;

    function __construct($attributes = NULL)
    {
	    $this->input_map = array(
        "id" 					=> "hidden",
        "artist_id" 	=> "select",
        "category_id" => "select",
        "medium_id" 	=> "select",
        "gallery" 		=> "select",
        "name" 				=> "text",
        "description" => "textarea",
				"photo_file"	=> "hidden"
				//,
				// "price"				=> "text",
				// "status"			=> "status"
				// "paypal_link"	=> "text"
      );
  
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
        $query = "SELECT * FROM art WHERE id = " . $id;
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
				echo "<div>No Art found.</div>";
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

    function get_category_id()
    {
        return $this->category_id;
    }

    function set_category_id( $val )
    {
        $this->category_id = $val;
    }

    function get_medium_id()
    {
        return $this->medium_id;
    }

    function set_medium_id( $val )
    {
        $this->medium_id = $val;
    }

    function get_gallery()
    {
        return $this->gallery;
    }

    function set_gallery( $val )
    {
        $this->gallery = $val;
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

    function get_photo_file()
    {
        return $this->photo_file;
    }

    function set_photo_file( $val )
    {
        $this->photo_file = $val;
    }

    function get_price()
    {
        return $this->price;
    }

    function set_price( $val )
    {
        $this->price = $val;
    }

    function get_status()
    {
        return $this->status;
    }

    function set_status( $val )
    {
        $this->status = $val;
    }

    function get_paypal_link()
    {
        return $this->paypal_link;
    }

    function set_paypal_link( $val )
    {
        $this->paypal_link = $val;
    }

		function set_properties_via_post($post_array)
		{	
			foreach( $this->input_map as $property => $value )
      {
        $set_value_from_post_array = "\$this->set_$property(\$post_array[\$property]);";
        eval( $set_value_from_post_array );
      }
		}

    function update()
    {
        if( $this->id != null && $this->id != "null" && $this->id != '' && $this->id != '0' && $this->id != 0)
            $this->updateRecord();
        else
            $this->insertRecord();
    }

    function insertRecord()
    {
        $query = 'INSERT INTO art ( id, artist_id, category_id, medium_id, name, description, gallery, photo_file, price, status, paypal_link ) VALUES ( 0, "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s" )';
        $query = sprintf( $query, $this->artist_id, $this->category_id, $this->medium_id, $this->name, $this->description, $this->gallery, $this->photo_file, $this->price, $this->status, $this->paypal_link );
        $result = mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
    }

    function updateRecord()
    {
        $query = 'UPDATE art SET artist_id="%s", category_id="%s", medium_id="%s", name="%s", description="%s", gallery="%s", photo_file="%s", price="%s", status="%s", paypal_link="%s" WHERE id = %s';
        $query = sprintf( $query, $this->artist_id, $this->category_id, $this->medium_id, $this->name, $this->description, $this->gallery, $this->photo_file, $this->price, $this->status, $this->paypal_link, $this->id );
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