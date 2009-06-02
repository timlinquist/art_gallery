<?php 
	require_once( "class.Photo.php" );

	class ArtistDisplay{
		function __construct($admin_access=false){ $this->admin_access= $admin_access;	}
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }

	 	public function display_artists( $artists )
    {
			foreach($artists as $artist){ $this->display_artist( $artist ); }
    }	

    public function clean_output( $output )
    {
      return stripslashes(str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $output));
    }

		public function display_artist( $artist )
		{
			$artist_name= ($this->admin_access) ? $artist->get_name() : $this->show_artist( $artist ) ;
			
			echo "<div id=\"artist_".$artist->get_id()."\" class='artist'>"
			  .$this->display_artist_photo( $artist )
				."<p id=\"artist_name_".$artist->get_id()."\"><strong>" .$artist_name. "</strong></p>"
				."<p><strong>Biography:</strong><a class=\"show_hide_link\" id=\"toggle_bio_".$artist->get_id()."\" href=\"javascript:void(0)\">show</a></p>"
				.$this->admin_options( $artist->get_id() )
				."<p style=\"display: none;\" id=\"artist_bio_".$artist->get_id()."\">".$this->clean_output($artist->get_biography()). "</p>\n"
				."</div>";
		}
		
		public function display_artist_photo( $artist )
		{
			$photo_file= $artist->get_photo_file();
			if($photo_file != '' && $photo_file != null)
			{
				$photo= new Photo( $photo_file );	
				$full_size_for_lightbox= "<div class='lb_photo_wrapper'><a href=\"".$photo->full_size_path()."\">";
				$thumbnail_img= "<img src=\"".$photo->thumb_path()."\" alt=\"".$artist->get_name()."\" title=\"".$artist->get_name()."\" /></a></div>";
				return $full_size_for_lightbox.$thumbnail_img;
			}
		}
		
		private function show_artist( $artist )
		{
			return "<a href='artist_show.php?id=" . $artist->get_id() . "'>" . $artist->get_name() . "</a>";
		}

		private function admin_options( $id )
		{
			if ($this->admin_access) 
			{
				return "<div class=\"edit_button\" id=\"edit_artist_".$id."\">".$this->edit_button( $id )."</div>"
				      ."<div class=\"delete_button\" id=\"delete_artist_".$id."\" class='delete_artist'>".$this->delete_button( $id )."</div>";
			}			
		}				
		private function edit_button( $id )
		{ 
			return "<a href='artist_form.php?artist=$id' title='edit artist' class='edit_artist'><img src='../images/edit.png' title='edit artist' alt='edit artist' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='#' title='delete artist' id='delete_artist_link_$id'><img src='../images/delete.png' title='delete artist' alt='delete artist' /></a>"; 
		}
	}
?>