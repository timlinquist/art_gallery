<?php 
	require_once("class.Form.php");	
	class ArtistForm extends Form {
		function __construct($artist=null, $in_add_mode=true)
		{ 
			($artist==null) ? $this->artist= $artist= new Artists() : $this->artist= $artist;
			$this->in_add_mode=$in_add_mode;
		}
		public function render_inputs()
		{	
			return $this->hidden_input("id", $this->artist->get_id()).
						 $this->text_input("name", $this->artist->get_name()).
						 $this->textarea_input("biography", $this->artist->get_biography()).
						 $this->text_input("phone", $this->artist->get_phone()).
						 $this->text_input("email", $this->artist->get_email()).
						 $this->submit_button();
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