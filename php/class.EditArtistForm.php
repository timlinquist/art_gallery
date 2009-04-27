<?php 
	require_once("class.Form.php");	
	class EditArtistForm extends Form {
		function __construct($artist){ $this->artist= $artist; }
		
		public function render_inputs()
		{	
			return $this->get_action_input_for_controller().
						 $this->hidden_input("id", $this->artist->get_id()).
						 $this->text_input("name", $this->artist->get_name())."<br />".
						 $this->textarea_input("biography", $this->artist->get_biography()).
						 $this->text_input("phone", $this->artist->get_phone()).
						 $this->text_input("email", $this->artist->get_email()).
						 $this->submit_button();
		}		
		protected function legend(){ return "<legend>Edit Artist</legend>"; }		
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_artist' />"; 
		}
	}
?>