<?php 
	require_once("class.Finders.php");	
	require_once("class.Form.php");	
	class AddMediumForm extends Form {
	  var $medium;
		function __construct(){ $this->medium= new Mediums(); }
		
		public function render_inputs(){ parent::render_inputs( $this->medium ); }		
		protected function legend(){ return "<legend>Add Medium</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_medium' />";
		}
	}
?>