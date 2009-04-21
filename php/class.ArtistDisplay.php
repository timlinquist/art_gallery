<?php 
	require_once( "class.Photo.php" );

	class ArtistDisplay{
		function __construct($admin_access){ $this->admin_access= $admin_access;	}
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }

	 	public function display_artists( $artists )
    {
			foreach($artists as $artist){ $this->display_artist( $artist ); }
    }	

		public function display_artist( $artist )
		{
			$this->display_artist_photo( $artist );
			echo "<div id=\"artist_".$artist->get_id()."\">
							<p><strong>Name:&nbsp;</strong><span>".$artist->get_name()."</span></p>
							<p><strong>Biography:</strong></p>
							<p>".$artist->get_biography()."</p>
							<div class=\"contact_info\">
								<p><strong>Contact Information:</strong></p>
								<p><strong>Phone:&nbsp;</strong><span>".$artist->get_phone()."</span></p>
								<p><strong>Email:&nbsp;</strong><span>".$artist->get_email()."</span></p>
							</div>"
							.$this->admin_options( $artist->get_id() )
					."</div>";
		}
		
		public function display_artist_photo( $artist )
		{
			$photo= new Photo( $artist->get_photo_file() );
			echo "<img src=\"".$photo->thumb_path()."\" alt=\"".$artist->get_name()."\" title=\"".$artist->get_name()."\" />";
		}
		
		private function admin_options( $id )
		{
			if ($this->admin_access) 
			{
				return "<div id=\"edit_artist_".$id."\">".$this->edit_button( $id )."</div>
				<div id=\"delete_artist_".$id."\">".$this->delete_button( $id )."</div>";
			}			
		}				
		private function edit_button( $id ){ return "<img src='../images/edit.png' title='edit artist' alt='edit artist' />"; }
		private function delete_button( $id ){ return "<img src='../images/delete.png' title='delete artist' title='delete artist' />"; }
	}
?>