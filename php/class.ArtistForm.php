<?php 
	require_once("class.Form.php");	
	class ArtistForm extends Form {
	  var $artist;
	  var $in_add_mode;

		function __construct($artist=null, $in_add_mode=true)
		{ 
			($artist==null) ? $this->artist= $artist= new Artists() : $this->artist= $artist;
			$this->in_add_mode=$in_add_mode;
		}
		public function render_inputs()
		{	
		  parent::render_inputs( $this->artist );
		}		
		protected function legend()
    {
			$label= ($this->in_add_mode) ? "Add" : "Edit";
  	  return "<legend>$label Artist</legend>"; 		
    }
		protected function get_action_input_for_controller()
		{ 
			$action_to_take= ($this->in_add_mode) ? "add" : "edit";
			return "<input type='hidden' id='action' name='action' value='".$action_to_take."_artist' />";
		}
	}
?>