<?php 
	class ArtistDisplay{
	 	public function display_artists( $artists )
    {
			foreach($artists as $artist){ $this->display_artist( $artist ); }
    }	

		public function display_artist( $artist )
		{
			print_r($artist);
		}
	}
?>