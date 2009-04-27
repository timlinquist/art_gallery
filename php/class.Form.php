<?php 
	class Form{	
		function __construct(){ }
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render()
		{
			$action_input= $this->get_action_input_for_controller();
			echo "<form action='controller.php' method='post' accept-charset='utf-8'>
							<fieldset>".$this->legend().$this->render_inputs()."</fieldset>
						</form>";
		}
		public function render_inputs(){ return "OVERRIDE ME ( render_inputs() ) IN SUBCLASSES TO PRINT INPUTS FOR SPECIFIC CHILD FORM!"; }
		
		protected function legend(){ return "<legend>Edit</legend>"; }		
		pr function submit_button(){ return "<input type='submit' value='Save' />"; }
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