<?php 
	require_once( "db_connect.php" );
	require_once( "class.Artists.php" );

	class ArtistFinders{
	 	public function all_artists()
    {
			$query = "SELECT * FROM artists ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	$artist= array();
			while( $row = mysql_fetch_assoc( $result ) )
           $artists[]= new Artists( $row );
      return $artists;
    }

		public function find_artist( $id )
		{
			return new Artists($id);
		}
	}
?>