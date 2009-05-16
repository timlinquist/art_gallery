<?php 
	class Form{	
		function __construct(){}
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render()
		{
			echo "<form action='./php/controller.php' method='post' accept-charset='utf-8'><fieldset>\n";
				echo $this->legend();
				$this->render_inputs();
				echo $this->get_action_input_for_controller();
				echo "</fieldset>\n";
				echo $this->submit_button();
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
            $form_fields_to_render .= $this->textarea_input($property, $value_for_input);
					break;
					case "select":
						$form_fields_to_render .= $this->select_list($property, $value_for_input);
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
		protected function submit_button(){ return "<input type='submit' value='Save' />"; }
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
		private function input_wrapper_start($field)
		{ 
			return "<div id='".$field."_wrapper'>".$this->input_label($field); 
		}
		private function input_wrapper_end(){ return "</div>"; }
		private function input_label($field)
		{	
			$display_name= ucwords($field).": ";
			return "<label for='$field'>$display_name<span class='form_hint'>(required)</span></label>";
		}
	}
?>