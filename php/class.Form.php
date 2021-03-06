<?php 
	class Form{	
		function __construct(){}
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render()
		{
			echo "<form action='../php/controller.php' method='post' accept-charset='utf-8' id='main_form'><fieldset>\n";
				echo $this->legend();				
				$this->render_inputs();				
				echo $this->get_action_input_for_controller();
				echo $this->submit_button();
				echo "</fieldset>\n";
			echo "</form>\n";
		}		
		public function render_inputs($object_for_form)
		{ 
		  $form_fields_to_render = "";
      foreach( $object_for_form->input_map as $property => $value )
      {
        $get_value_for_input = "return \$object_for_form->get_$property();";
        $value_for_input= eval( $get_value_for_input );
        
        switch($value)
        {
          case "hidden":
            $form_fields_to_render .= $this->hidden_input($property, $value_for_input);
          break;
          case "text":
            $form_fields_to_render .= $this->text_input($property, $value_for_input);
          break;      
          case "textarea":
            $form_fields_to_render .= $this->textarea_input($property, stripslashes($value_for_input));
					break;
					case "select":
						switch($property)
						{
              case "sold":
                $form_fields_to_render .= $this->generate_select_with_opts($property, $value_for_input, "sold");
              break;
							case "category_id":
								$form_fields_to_render .= $this->generate_select_with_opts($property, $value_for_input, "categories");							
							break;
							case "medium_id":
								$form_fields_to_render .= $this->generate_select_with_opts($property, $value_for_input, "mediums");							
							break;
							case "artist_id":
								$form_fields_to_render .= $this->generate_select_with_opts($property, $value_for_input, "artists");							
							break;
							case "gallery":
								$form_fields_to_render .= $this->generate_select_with_opts($property, $value_for_input, "galleries");							
							break;
						}
          break;
        }
      }
      echo $form_fields_to_render;
		}
		
		protected function object_exists($object)
		{
				$id= $object->get_id();
				return ($id !=null && $id != ""); 
		}
		protected function legend(){ return "OVERRIDE ME ( render_inputs() ) IN SUBCLASSES TO PRINT INPUTS FOR SPECIFIC CHILD FORM!"; }		
		protected function submit_button(){ return "<div class='flash'>&nbsp;</div><div class='form_buttons'><input type='submit' value='Save' /></div>"; }
		protected function hidden_input($field, $value)
		{
			return "<input type='hidden' name='$field' id='$field' value='$value' />"; 
		}
		protected function text_input($field, $value)
		{
			return $this->input_wrapper_start($field)."<input type='text' name='$field' id='$field' value='$value' />".$this->input_wrapper_end(); 			
		}
		protected function textarea_input($field, $value)
		{
			return $this->input_wrapper_start($field)."<textarea rows='10' cols='60' name='$field' id='$field'>$value</textarea>".$this->input_wrapper_end(); 
		}
		protected function input_wrapper_start($field, $required=true)
		{ 
			return "<div id='".$field."_wrapper'>".$this->input_label($field, $required); 
		}
		protected function input_wrapper_end(){ return "</div>"; }
		private function input_label($field, $required)
		{	
			$has_an_id= strrpos($field, "id");
			if($has_an_id){ 
				$display_name= ucwords( str_replace("_id", "", $field)) . ": ";				
			}
			else{
				$display_name= ucwords($field).": ";				
			}
			$live_validation= ($required) ? "<span class='form_hint'>(required)</span>" : "";
			return "<label for='$field'>$display_name$live_validation</label>";
		}
	}
?>