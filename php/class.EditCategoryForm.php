<?php 
	require_once("class.Form.php");	
	class EditCategoryForm extends Form {
	  var $category;
		function __construct($category){ $this->category= $category;}
		public function render()
		{
			if( $this->object_exists($this->category) )
			{
				parent::render();
			}
		}
		public function render_inputs(){ parent::render_inputs( $this->category ); }		
		protected function legend(){ return "<legend>Edit Category</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_category' />";
		}
	}
?>