<?php 
	require_once("class.Finders.php");
	require_once("class.Photo.php" );
	require_once("class.Art.php");
	
	class ArtDisplay{
		function __construct($admin_access=false){ $this->admin_access= $admin_access; }
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }

	 	public function display_art( $art )
    {
			foreach($art as $art_piece){ $this->display_art_piece( $art_piece ); }
    }	

		public function display_art_piece( $art_piece )
		{
			$admin_options= ($this->admin_access) ? $this->buttons( $art_piece->get_id() ) : "";
			echo "<div id=\"art_".$art_piece->get_id()."\" class='art_piece'>"
							.$this->display_art_photo( $art_piece )
							. "<div class='art_piece_details'><strong>".$art_piece->get_name()."</strong><br />"
//							. $this->get_medium_name($art_piece) .", ". $this->get_category_name($art_piece) ."<br />"
			 				. "by ". $this->get_artist_name($art_piece)
							.	$admin_options						
							. "</div>"
					."</div>";
		}
		
		public function display_art_photo( $art_piece )
		{
			$photo_file= $art_piece->get_photo_file();
			if($photo_file != '' && $photo_file != null)
			{
				$photo= new Photo( $photo_file);	
				$full_size_for_lightbox= "<div class='lb_photo_wrapper'><a rel='lightbox-gallery' title=\"".$art_piece->get_name()."\" href=\"".$photo->full_size_path()."\">";
				$thumbnail_img= "<img src=\"".$photo->thumb_path()."\" alt=\"".$art_piece->get_name()."\" title=\"".$art_piece->get_name()."\" /></a></div>";
				return $full_size_for_lightbox.$thumbnail_img;
			}
		}
		
		private function get_category_name($art_piece)
		{
			$finder= new Finders();
			$category_for_art_piece= $finder->find_category($art_piece->get_category_id());
			if($category_for_art_piece)
			{
				return $category_for_art_piece->get_name();
			}
			return "No category selected.";
		}
		private function get_medium_name($art_piece)
		{
			$finder= new Finders();
			$medium_for_art_piece= $finder->find_medium($art_piece->get_medium_id());
			if($medium_for_art_piece)
			{
				return $medium_for_art_piece->get_name();
			}
			return "No medium selected.";
		}
		private function get_artist_name($art_piece)
		{
			$finder= new Finders();
			$artist_for_art_piece= $finder->find_artist($art_piece->get_artist_id());
			if($artist_for_art_piece)
			{
				return $artist_for_art_piece->get_name();
			}
			return "No artist selected.";
		}
		
		private function buttons($id)
		{
			return "<div id=\"edit_art_".$id."\" class='edit_button'>".$this->edit_button( $id )."</div>"
						. "<div id=\"delete_art_".$id."\" class='delete_art'>".$this->delete_button( $id )."</div>";
		}
		private function edit_button( $id )
		{ 
			return "<a href='art_form.php?art=$id' title='edit art' class='edit_art'><img src='../images/edit.png' title='edit art' alt='edit art' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='#' title='delete art' id='delete_art_link_$id'><img src='../images/delete.png' title='delete art' alt='delete art' /></a>"; 
		}
	}
?>