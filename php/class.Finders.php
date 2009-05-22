<?php 
	require_once( "db_connect.php" );
	require_once( "class.Artists.php" );
	require_once( "class.Categories.php" );
	require_once( "class.Mediums.php" );

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

	 	public function all_mediums()
    {
			$query = "SELECT * FROM mediums ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	$mediums= array();
			while( $row = mysql_fetch_assoc( $result ) )
           $mediums[]= new Mediums( $row );
      return $mediums;
    }

	 	public function all_art()
    {
			$query = "SELECT * FROM art ORDER BY name ASC";
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
     	$art= array();
			while( $row = mysql_fetch_assoc( $result ) )
           $art[]= new Art( $row );
      return $art;
    }

		public function find_art( $id ){ return new Art($id); }
		public function find_artist( $id ){ return new Artists($id); }
		public function find_category( $id ){ return new Categories($id); }
		public function find_medium( $id ){ return new Mediums($id); }
	}

?>