<?php 
	require_once("class.Form.php");	
	class AddArtistForm extends Form {
	  var $artist;
		function __construct(){ $this->artist= new Artists(); }
		
		public function render_inputs(){ parent::render_inputs( $this->artist ); }		
		protected function legend(){ return "<legend>Add Artist</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_artist' />";
		}
	}
?>