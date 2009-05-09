<?php 
	require_once("class.Form.php");	
	class EditArtistForm extends Form {
	  var $artist;
		function __construct($artist){ $this->artist= $artist; }
		
		public function render_inputs(){ parent::render_inputs( $this->artist ); }		
		protected function legend(){ return "<legend>Edit Artist</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_artist' />";
		}
	}
?>