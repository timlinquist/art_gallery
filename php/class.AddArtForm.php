<?php 
	require_once("class.Form.php");	
	require_once("class.Art.php");	
	class AddArtForm extends Form {
	  var $art;
		function __construct(){ $this->art= new Art(); }
		
		public function render_inputs(){ parent::render_inputs( $this->art ); }		
		
		protected function generate_select_with_opts($field, $value, $named_method_to_eval)
		{
			$select_list	= "<select name='$field' id='$field' />"; 
			$select_opts = eval( "return \$this->generate_$named_method_to_eval($value);" );
			$select_list .= $select_opts;
			$select_list .= "</select>";
			return $select_list;
		}
		protected function legend(){ return "<legend>Add Art</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='add_art' />";
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
		private function generate_artists($artist_to_select=null)
		{
			$finder= new Finders();
			$artists= $finder->all_artists();
			$options="";
			foreach( $artists as $artist )
			{ 
				$options .= "<option value='".$artist->get_id()."'>".$artist->get_name()."</option>"; 
			}
			return $options;
		}
		private function generate_mediums($medium_to_select=null)
		{
			$finder= new Finders();
			$mediums= $finder->all_mediums();
			$options="";
			foreach( $mediums as $medium )
			{ 
				$options .= "<option value='".$medium->get_id()."'>".$medium->get_name()."</option>"; 
			}
			return $options;
		}

	}
?>