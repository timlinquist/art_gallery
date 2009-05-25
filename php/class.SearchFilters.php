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
			
			if( $this->medium_defined() )
			{ 
				$query .= " medium_id = " . $this->medium_id;
				$use_and = true;
			}
			
			if( $this->category_defined() )
			{ 
				$and = ($use_and) ? " AND" : "";
				$query .= $and . " category_id = " . $this->category_id;
				$use_and=true;
			}
			
			if( $this->artist_defined() )
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
			(!$this->medium_defined())	  
			&&
			(!$this->category_defined())	  
			&&
			(!$this->artist_defined());	  			
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
			$category_filter = ( $this->category_defined() ) ? '' : " AND category_id = " . $this->category_id;
						
			$query = "SELECT * FROM artists WHERE id IN 
			(SELECT artist_id FROM art where medium_id=" . $this->medium_id . $category_filter . ") ORDER BY name ASC";
			
			$result= mysql_query( $query ) or die( mysql_error() . "<br />Here is the query that failed:<br />\n" . $query );
			while( $row = mysql_fetch_assoc( $result ) )
	           $artists[]= new Artists( $row );
	
			if(! isset($artists)){ $artists= array(); }

			$art_search_form= new ArtSearchForm(null, null, $artists);
			echo "artist|". $art_search_form->generate_select_for_collection('artist', null, true);
		}
		private function category_defined()
		{
			return $this->category_id != 0 && $this->category_id != '0' && $this->category_id != null && $this->category_id != 'null';		
		}

		private function medium_defined()
		{
			return $this->medium_id != 0 && $this->medium_id != '0' && $this->medium_id != null && $this->medium_id != 'null';		
		}
		
		private function artist_defined()
		{
			return $this->artist_id != 0 && $this->artist_id != '0' && $this->artist_id != null && $this->artist_id != 'null';		
		}
	}
	
?>