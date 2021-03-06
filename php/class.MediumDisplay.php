<?php 
	require_once("class.Finders.php");
	
	class MediumDisplay{
		function __construct(){ }
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }

	 	public function display_mediums( $mediums )
    {
			foreach($mediums as $medium){ $this->display_medium( $medium ); }
    }	

		public function display_medium( $medium )
		{
			echo "<div id=\"medium_".$medium->get_id()."\" class='medium'>"
							."<div class='medium_name'>".$medium->get_name()."</div>"
							.$this->buttons( $medium->get_id() )
					."</div>";
		}
		private function buttons($id)
		{
			return "<div class='edit_medium_button' id=\"edit_medium_".$id."\">".$this->edit_button( $id )."</div>"
						 . "<div id=\"delete_medium_".$id."\" class='delete_medium'>".$this->delete_button( $id )."</div>";
		}
		private function edit_button( $id )
		{ 
			return "<a href='medium_form.php?medium=$id' title='edit medium' class='edit_medium'><img src='../images/edit.png' title='edit medium' alt='edit medium' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='#' title='delete medium' id='delete_medium_$id'><img src='../images/delete.png' title='delete medium' alt='delete medium' /></a>"; 
		}
	}
?>