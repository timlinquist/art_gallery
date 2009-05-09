<?php 
	require_once("class.Form.php");	
	class AddCategoryForm extends Form {
	  var $category;
		function __construct(){ $this->category= new Categories(); }
		
		public function render_inputs(){ parent::render_inputs( $this->category ); }		
		protected function legend(){ return "<legend>Add Category</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_category' />";
		}
	}
?>