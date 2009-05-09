<?php 
	class CategoryDisplay{
		function __construct(){ }
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }

	 	public function display_categories( $categories )
    {
			foreach($categories as $category){ $this->display_category( $category ); }
    }	

		public function display_category( $category )
		{
			echo "<div id=\"category_".$category->get_id()."\">"
							. "<p><strong>Name:&nbsp;</strong><span>"
							. $category->get_name()
							."</div>"
							.$this->buttons( $category->get_id() )
					."</div>";
		}
		private function buttons($id)
		{
			edit_button($id) . delete_button($id);
		}
		private function edit_button( $id )
		{ 
			return "<a href='category_form.php?artist=$id' title='edit category' class='edit_category'><img src='./images/edit.png' title='edit category' alt='edit category' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='#' title='delete category' id='delete_category_$id'><img src='./images/delete.png' title='delete category' alt='delete category' /></a>"; 
		}
	}
?>