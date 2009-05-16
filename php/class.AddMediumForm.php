<?php 
	require_once("class.Finders.php");	
	require_once("class.Form.php");	
	class AddMediumForm extends Form {
	  var $medium;
		function __construct(){ $this->medium= new Mediums(); }
		
		public function render_inputs(){ parent::render_inputs( $this->medium ); }		
		protected function legend(){ return "<legend>Add Medium</legend>"; }
		protected function generate_select_with_opts($field, $value, $named_method_to_eval)
		{
			$select_list	= "<select name='$field' id='$field' />"; 
			$select_opts = eval( "return \$this->generate_$named_method_to_eval($value);" );
			$select_list .= $select_opts;
			$select_list .= "</select>";
			return $select_list;
		}
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_medium' />";
		}
		private function generate_categories($cat_to_select=null)
		{
			$finder= new Finders();
			$categories= $finder->all_categories();
			$options="";
			foreach( $categories as $category )
			{ 
				$options .= "<option value='".$category->get_id()."'>".$category->get_name()."</option>"; 
			}
			return $options;
		}
	}
?>