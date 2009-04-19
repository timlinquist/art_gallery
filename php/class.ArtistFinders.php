<?php 
	require_once( "db_connect.php" );

	class ArtistFinders{
	 	public function all_artists()
    {
			$query = "SELECT id, name, photo_id, biography, phone, email FROM artists ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	while( $row = mysql_fetch_row( $result ) )
           $artists[]= $row;
      return $artists;
    }
	}
?>