<?php 
	require_once("class.Form.php");	
	class AddMediumForm extends Form {
	  var $medium;
		function __construct(){ $this->medium= new Mediums(); }
		
		public function render_inputs(){ parent::render_inputs( $this->medium ); }		
		protected function legend(){ return "<legend>Add Medium</legend>"; }
		protected function select_list($field, $value)
		{
			$select_list	= "<select name='$field' id='$field' />"; 
			$select_list .= "<option>Testing</option>";
			$select_list .= "</select>";
			return $select_list;
		}
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_medium' />";
		}
	}
?>