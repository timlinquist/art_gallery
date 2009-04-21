<?php 
	require_once( "class.Photo.php" );

	class ArtistDisplay{
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
				</div>
			</div>";
		}
		
		public function display_artist_photo( $artist )
		{
			$photo= new Photo( $artist->get_photo_file() );
			// echo "<img src=\"".$artist->$photo->thumb_path()."\" alt=\"".$artist->get_name()."\" title=\"".$artist->get_name()."\" />";
			echo "<img src=\"".$artist->get_photo_file()."\" alt=\"".$artist->get_name()."\" title=\"".$artist->get_name()."\" />";
		}
	}
?>