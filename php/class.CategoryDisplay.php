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
							.$this->buttons( $category->get_id() )
					."</div>";
		}
		private function buttons($id)
		{
			return "<div id=\"edit_category_".$id."\">".$this->edit_button( $id )."</div>";
						// . "<div id=\"delete_category_".$id."\" class='delete_category'>".$this->delete_button( $id )."</div>";
		}
		private function edit_button( $id )
		{ 
			return "<a href='category_form.php?category=$id' title='edit category' class='edit_category'><img src='./images/edit.png' title='edit category' alt='edit category' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='#' title='delete category' id='delete_category_$id'><img src='./images/delete.png' title='delete category' alt='delete category' /></a>"; 
		}
	}
?>