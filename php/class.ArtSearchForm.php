<?php 
	require_once('class.Finders.php');
	require_once("class.Form.php");	
	
	class ArtSearchForm extends Form
	{
		var $categories;
		var $mediums;
		var $artists;
		
		function __construct()
		{
			$finder= new Finders();
			$this->categories= $finder->all_categories();
			$this->mediums= $finder->all_mediums();
			$this->artists= $finder->all_artists();			
		}
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render_form()
		{
			echo "<form id='art_search'><fieldset>";
			echo "<legend>Art Seach</legend>";
			$this->generate_select_lists();
			echo "<div id='view_results'><input type='submit' value='View Results' id='view_results_submit' /></div>";
			echo "</fieldset></form>";
		}

		private function generate_select_lists()
		{
			echo $this->generate_select_for_collection('category');
			echo $this->generate_select_for_collection('medium');
			echo $this->generate_select_for_collection('artist');
		}

		private function generate_select_for_collection($type, $selected=null)
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
			$select="<select id='$type'>";
			$select .= $this->default_option($type, $selected);
			
			foreach( $collection as $object )
			{ 
				$select .= "<option value='".$object->get_id()."'>".$object->get_name()."</option>"; 
			}
			$select .= "</select>";
			return $this->input_wrapper_start($type, false) . $select . $this->input_wrapper_end();
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