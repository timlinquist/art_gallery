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
			echo $this->show_artist( $artist );
		}
		
		public function display_artist_contact_info( $artist )
		{
		  $phone = $artist->get_phone();
		  $email = $artist->get_email_link();
      $contact_info = ""
        . "<div class='artist_contact'>\n"
        . "  <p>$phone</p>\n"
        . "  <p>$email</p>\n"
        . "</div>";
      return $contact_info;
		}
		
		public function display_artist_photo( $artist )
		{
			$photo_file= $artist->get_photo_file();
			if($photo_file != '' && $photo_file != null)
			{
				$photo= new Photo( $photo_file );	
				$full_size_for_lightbox= "<div class='bio_photo'><a rel='lightbox' href=\"".$photo->full_size_path()."\" title=\"".$artist->get_name()."\">";
				$thumbnail_img= "<img src=\"".$photo->thumb_path()."\" alt=\"".$artist->get_name()."\" title=\"".$artist->get_name()."\" /></a></div>";
				return $full_size_for_lightbox.$thumbnail_img;
			}
		}
		
		public function get_artist_thumbnail_path( $artist )
		{
			$photo_file= $artist->get_photo_file();
			if($photo_file != '' && $photo_file != null)
			{
				$photo= new Photo( $photo_file );	
        return $photo->thumb_path();
		  }
		}
		
    public function get_artist_link_in_li( $artist ) {
      return "<li><a id='artist_".$artist->get_id()."' class='artist' href='artist_show.php?id=" . $artist->get_id() . "'>" . $artist->get_name() . "</a></li><span class='artist_thumbnail_path' id='artist_thumbnail_path_".$artist->get_id()."'>".$this->get_artist_thumbnail_path($artist)."</span>\n";
    }
		
		
		private function show_artist( $artist )
		{
		  if( $this->admin_access ) {
			  return "<div id=\"artist_".$artist->get_id()."\" class='artist_div'>"
							."  <div class='artist_name'>".$artist->get_name()."</div>"
							.   $this->admin_options( $artist->get_id() )
              .   "<div id=\"artist_details_".$artist->get_id()."\" class='artist_details' style='display: none;'>"
              .   $this->display_artist_contact_info( $artist )
              .   $this->display_artist_photo( $artist )
              .   $artist->get_biography()
              .   "</div>"
					    ."</div>";
		  }
		  else {
		    return "<a id='artist_".$artist->get_id()."' class='artist' href='artist_show.php?id=" . $artist->get_id() . "'>" . $artist->get_name() . "</a>";
		  }
		}

		private function admin_options( $id )
		{
			if ($this->admin_access) 
			{
				return "" //"<a style=\"padding-top: 15px;\" class=\"show_hide_link edit_button\" id=\"toggle_contact_".$id."\" href=\"javascript:void(0)\">contact info</a></p>"
	            ."<div class=\"show_artist_button\" id=\"show_artist_".$id."\">".$this->show_button( $id )."</div>"
		          ."<div class=\"edit_artist_button\" id=\"edit_artist_".$id."\">".$this->edit_button( $id )."</div>"
				      ."<div class=\"delete_artist\" id=\"delete_artist_".$id."\" class='delete_artist'>".$this->delete_button( $id )."</div>";
			}			
		}				
		private function edit_button( $id )
		{ 
			return "<a href='artist_form.php?artist=$id' title='edit artist' class='edit_artist'><img src='../images/edit.png' title='edit artist' alt='edit artist' /></a>"; 
		}
		private function delete_button( $id )
		{
			 return "<a href='javascript:void(0)' title='delete artist' id='delete_artist_link_$id'><img src='../images/delete.png' title='delete artist' alt='delete artist' /></a>"; 
		}
		private function show_button( $id )
		{
			 return "<a href='javascript:void(0)' title='show artist' class='show_artist_link' id='show_artist_link_$id'><img src='../images/zoom.png' title='show artist' alt='show artist' /></a>"; 
		}
	}
?>