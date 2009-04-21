<?php 
	class ArtistDisplay{
	 	public function display_artists( $artists )
    {
			foreach($artists as $artist){ $this->display_artist( $artist ); }
    }	

		public function display_artist( $artist )
		{
			echo "<div id=\"".$artist->get_id()."\">
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
		}
	}
?>