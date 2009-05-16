<?php 
	require_once("class.Form.php");	
	class EditMediumForm extends Form {
	  var $artist;
		function __construct($medium){ $this->medium= $medium; }
		
		public function render()
		{
			if( $this->object_exists($this->medium) )
			{
				parent::render();
			}
		}
		public function render_inputs(){ parent::render_inputs( $this->medium ); }		
		protected function legend(){ return "<legend>Edit Medium</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_medium' />";
		}
	}
?>