<?php 
	require_once('class.Finders.php');
	require_once("class.Form.php");	
	
	class ArtSearchForm extends Form
	{
		var $categories;
		var $mediums;
		var $artists;
		
		function __construct($categories=null, $mediums=null, $artists=null)
		{
			$finder= new Finders();
			if($categories 	== null)	{ $categories	= $finder->all_categories(); }
			if($mediums 		== null)	{ $mediums		= $finder->all_mediums(); }
			if($artists 		== null)		{ $artists		= $finder->all_artists(); }
			
			$this->categories	= $categories;
			$this->mediums		= $mediums;
			$this->artists		= $artists;			
		}
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render_form()
		{
			echo "<form id='art_search' action='./php/do_search.php' method='post'><fieldset>";
			echo "<legend>Art Seach</legend>";
			echo "<input type='hidden' value='search' id='search' name='search' />";
			$this->generate_select_lists();
			echo "<div id='search'><input type='submit' value='Search' id='search' /></div>";
			echo "</fieldset></form>";
		}

		private function generate_select_lists()
		{
			echo $this->generate_select_for_collection('category');
			echo $this->generate_select_for_collection('medium');
			echo $this->generate_select_for_collection('artist');
		}

		public function generate_select_for_collection($type, $selected=null, $is_filtered=false)
		{
			switch($type)
			{
				case "category":
					$collection= $this->categories;
				break;
				case "medium":
					$collection= $this->mediums;
				break;
				case "artist":
					$collection= $this->artists;
				break;
			}
			$select="<select id='$type' name='$type'>";
			if(!$is_filtered){ $select .= $this->default_option($type, $selected); }
			
			foreach( $collection as $object )
			{ 
				$select .= "<option value='".$object->get_id()."'>".$object->get_name()."</option>"; 
			}
			$select .= "</select>";
			
			if($is_filtered){ return $select; }
			
			return $this->input_wrapper_start($type, false) . 
			"<span id='" . $type . "_select_wrapper'>". $select . "</span>" . 
			$this->input_wrapper_end();
		}
		
		private function default_option($type, $selected)
		{
			$default_selection= ($type == 'artist') ? "Select an " : "Select a ";
			$default_selection .= $type;
			$selected = ($selected==null) ? true : false;
			return "<option value='0' selected='$selected'>$default_selection</option>";
		}
	}
?>