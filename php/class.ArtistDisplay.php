<?php 
	class ArtistDisplay{
	 	public function display_artists( $artists )
    {
			foreach($artists as $artist){ $this->display_artist( $artist ); }
    }	

		public function display_artist( $artist )
		{
			echo "<pre>";
			print_r($artist);
			echo "</pre>";
		}
	}
?>