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
		protected function generate_select_with_opts($field, $value, $named_method_to_eval)
		{
			$select_list	= "<select name='$field' id='$field' />"; 
			$select_opts = eval( "return \$this->generate_$named_method_to_eval($value);" );
			$select_list .= $select_opts;
			$select_list .= "</select>";
			return $select_list;
		}
		public function render_inputs(){ parent::render_inputs( $this->medium ); }		
		protected function legend(){ return "<legend>Edit Medium</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_medium' />";
		}
		private function generate_categories($cat_to_select=null)
		{
			$finder= new Finders();
			$categories= $finder->all_categories();
			$options="";
			foreach( $categories as $category )
			{ 
				$cat_id= $category->get_id();				
				$selected = ($cat_id==$cat_to_select) ? "selected='1'" : "";
				$options .= "<option value='".$category->get_id()."' $selected>".$category->get_name()."</option>"; 
			}
			return $options;
		}
	}
?>