<?php 
	require_once("class.Form.php");	
	class EditArtForm extends Form {
	  var $art;
		function __construct($art){ $this->art= $art; }
		
		public function render()
		{
			if( $this->object_exists($this->art) )
			{
				parent::render();
			}
		}
		public function render_inputs(){ parent::render_inputs( $this->art ); }		
		
		protected function generate_select_with_opts($field, $value, $named_method_to_eval)
		{			
			$select_list	 = 	$this->input_wrapper_start($field); 
			$select_list	.= "<select name='$field' id='$field' />"; 
			$select_opts	 = eval( "return \$this->generate_$named_method_to_eval(\$value);" );
			$select_list	.= $select_opts;
			$select_list 	.= "</select>";
			$select_list 	.= 	$this->input_wrapper_end();
			return $select_list;
		}
		protected function legend(){ return "<legend>Edit Art</legend>"; }
		protected function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_art' />";
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
		
		private function generate_artists($artist_to_select=null)
		{
			$finder= new Finders();
			$artists= $finder->all_categories();
			$options="";
			foreach( $artists as $artist )
			{ 
				$artist_id= $artist->get_id();				
				$selected = ($artist_id==$artist_to_select) ? "selected='1'" : "";
				$options .= "<option value='".$artist->get_id()."' $selected>".$artist->get_name()."</option>"; 
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
				$medium_id= $medium->get_id();				
				$selected = ($medium_id==$medium_to_select) ? "selected='1'" : "";
				$options .= "<option value='".$medium->get_id()."' $selected>".$medium->get_name()."</option>"; 
			}
			return $options;
		}
		private function generate_galleries($gallery_to_select=null)
		{
			$options="";
			foreach( $GLOBALS['galleries'] as $gallery )
			{ 
				$selected = ($gallery==$gallery_to_select) ? "selected='1'" : "";
				$options .= "<option value='$gallery' $selected>$gallery</option>"; 
			}
			return $options;
		}
	
	}
?>