<?php 
	require_once( "db_connect.php" );
	require_once( "class.Artists.php" );
	require_once( "class.Categories.php" );

	class Finders{
	 	public function all_artists()
    {
			$query = "SELECT * FROM artists ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	$artists= array();
			while( $row = mysql_fetch_assoc( $result ) )
           $artists[]= new Artists( $row );
      return $artists;
    }
		
	 	public function all_categories()
    {
			$query = "SELECT * FROM categories ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	$categories= array();
			while( $row = mysql_fetch_assoc( $result ) )
           $categories[]= new Categories( $row );
      return $categories;
    }

		public function find_artist( $id ){ return new Artists($id); }
		public function find_category( $id ){ return new Categories($id); }
	}
?>