<?php 
	class EditArtistForm{
		
		function __construct($artist){ $this->artist= $artist; }
		function __get($prop_name){ return $this->$prop_name; }
  	function __set($prop_name, $value ){ $this->$prop_name = $value; }

		public function render()
		{
			$action_input= $this->get_action_input_for_controller();
			echo "<form action='controller.php' method='post' accept-charset='utf-8'>
							<fieldset>".$this->legend().$this->render_inputs()."</fieldset>
						</form>";
		}
		
		public function render_inputs()
		{	
			return "<div>".$this->get_action_input_for_controller()."</div>".
						 "<div>".$this->hidden_input("id", $this->artist->get_id())."</div>".
						 "<div>".$this->input_label("name").$this->text_input("name", $this->artist->get_name())."</div>".
						 "<div>".$this->input_label("biography")."<br />".$this->textarea_input("biography", $this->artist->get_biography())."</div>".
						 "<div>".$this->input_label("phone").$this->text_input("phone", $this->artist->get_phone())."</div>".
						 "<div>".$this->input_label("email").$this->text_input("email", $this->artist->get_email())."</div>".
						$this->submit_button();
		}
		
		private function legend(){ return "<legend>Edit Artist</legend>"; }
		private function submit_button(){ return "<input type='submit' value='Submit' />"; }
		private function input_label($name)
		{	
			$display_name= ucwords($name).": ";
			return "<label for='$name'>$display_name<span class='form_hint'>(required)</span></label>";
		}
		private function get_action_input_for_controller()
		{ 
			return "<input type='hidden' id='action' name='action' value='edit_artist' />"; 
		}
		
		private function hidden_input($field, $value)
		{
			return "<input type='hidden' name='$field' id='artist_$field' value='$value' />"; 
		}
		
		private function text_input($field, $value)
		{
			return "<input type='text' name='$field' id='artist_$field' value='$value' />"; 			
		}
		
		private function textarea_input($field, $value)
		{
			return "<textarea rows='10' cols='60' name='$field' id='artist_$field'>$value</textarea>"; 
		}
	}
?>