<?php 
	require_once( "db_connect.php" );
	require_once( "class.Art.php" );
	require_once( "class.Artists.php" );
	require_once( "class.Categories.php" );
	require_once( "class.Mediums.php" );
	require_once( "class.ArtSearchForm.php" );
	
	class SearchFilters
	{
		function __construct($artist_id=null, $category_id=null, $medium_id=null)
		{
			$this->artist_id		=	mysql_real_escape_string($artist_id);
			$this->category_id	=	mysql_real_escape_string($category_id);
			$this->medium_id		=	mysql_real_escape_string($medium_id);				
		}
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }
		
		public function filter_art_by_all()
		{
			$where_clause = ($this->no_where_clause_for_filter()) ? "" : "WHERE" ;			
			$use_and = false;
			
			$query = "SELECT * FROM art $where_clause";
			
			if($this->medium_id != 0 || $this->medium_id != '0')
			{ 
				$query .= " medium_id = " . $this->medium_id;
				$use_and = true;
			}
			
			if($this->category_id != 0 || $this->category_id != '0')
			{ 
				$and = ($use_and) ? " AND" : "";
				$query .= $and . " category_id = " . $this->category_id;
				$use_and=true;
			}
			
			if($this->artist_id != 0 || $this->artist_id != '0')
			{ 
				$and = ($use_and) ? " AND" : "";
				$query .= $and . " artist_id = " . $this->artist_id;
			}
												
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $art[]= new Art( $row );
			if(!isset($art)){$art= array();}
			return $art;
		}
		
	  private function no_where_clause_for_filter()
	  {
			($this->medium_id == 0 || $this->medium_id == '0')	  
			&&
			($this->category_id == 0 || $this->category_id == '0')	  
			&&
			($this->artist_id == 0 || $this->artist_id == '0');	  			
		}
		
		public function filtered_by_artist()
		{
			$query = "SELECT * FROM categories WHERE id IN 
			(SELECT category_id FROM art where artist_id=" . $this->artist_id . ") ORDER BY name ASC";
			
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $categories[]= new Categories( $row );

			$query = "SELECT * FROM mediums WHERE id IN 
			(SELECT medium_id FROM art where artist_id=" . $this->artist_id . ") ORDER BY name ASC";
			
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $mediums[]= new Mediums( $row );
	
			if(! isset($categories)){ $categories= array(); }
			if(! isset($mediums)){ $mediums= array(); }

			$art_search_form= new ArtSearchForm($categories, $mediums);
			echo "category|" . $art_search_form->generate_select_for_collection('category', null, true) .
			"|medium|". $art_search_form->generate_select_for_collection('medium', null, true);
		}
		
		public function filtered_by_category()
		{
			$query = "SELECT * FROM mediums WHERE id IN 
			(SELECT medium_id FROM art where category_id=" . $this->category_id . ") ORDER BY name ASC";

			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $mediums[]= new Mediums( $row );

			$query = "SELECT * FROM artists WHERE id IN 
			(SELECT artist_id FROM art where category_id=" . $this->category_id . ") ORDER BY name ASC";

			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $artists[]= new Artists( $row );
	
			if(! isset($artists)){ $artists= array(); }
			if(! isset($mediums)){ $mediums= array(); }
			
			$art_search_form= new ArtSearchForm(null, $mediums, $artists);
			echo "medium|" . $art_search_form->generate_select_for_collection('medium', null, true) .
			"|artist|". $art_search_form->generate_select_for_collection('artist', null, true);
		}
		
		public function filtered_by_medium()
		{
			$query = "SELECT * FROM categories WHERE id IN
			(SELECT category_id FROM art where medium_id=" . $this->medium_id . ") ORDER BY name ASC";

			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $categories[]= new Categories( $row );

			$query = "SELECT * FROM artists WHERE id IN 
			(SELECT artist_id FROM art where medium_id=" . $this->medium_id . ") ORDER BY name ASC";
			
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $artists[]= new Artists( $row );
	
			if(! isset($artists)){ $artists= array(); }
			if(! isset($categories)){ $categories= array(); }

			$art_search_form= new ArtSearchForm($categories, null, $artists);
			echo "category|".$art_search_form->generate_select_for_collection('category', null, true) .
			"|artist|". $art_search_form->generate_select_for_collection('artist', null, true);
		}
	}
	
?>