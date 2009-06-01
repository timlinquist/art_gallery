<?php
	require_once("class.PhotoResizer.php");
	
	class PhotoUploader {
		const FULL_SIZE_FOLDER_PATH = "../photos/full_size/";
		const THUMB_SIZE_FOLDER_PATH = "../photos/thumb_size/";
		var $files;
		var $resizer;
		
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
		function __construct($files){ $this->files= $files; }
		
		public function upload()
		{
			$uniqified_timestamp= mktime() . "_";
			$full_size_upload = self::FULL_SIZE_FOLDER_PATH . $uniqified_timestamp . basename($this->files['photo_upload']['name']);

			if(is_uploaded_file($this->files['photo_upload']['tmp_name']))
			{
				if(move_uploaded_file($this->files['photo_upload']['tmp_name'], $full_size_upload)) 
				{
					$this->generate_resized_photos($full_size_upload, $uniqified_timestamp);
					$thumb_url= self::THUMB_SIZE_FOLDER_PATH . $uniqified_timestamp . basename($this->files['photo_upload']['name']);
					echo "success|".$thumb_url."|". $uniqified_timestamp . $this->files['photo_upload']['name'];
					return;
				} 
				echo "error";
			}			
		}
		
		private function generate_resized_photos($full_size_upload, $timestamp)
		{
			$thumb_file_name= $timestamp . basename($this->files['photo_upload']['name']);
			$this->resizer= new PhotoResizer($full_size_upload, $thumb_file_name);
			$this->generate_thumbnail($full_size_upload);
		}	
		private function generate_thumbnail($photo){ $this->resizer->resize($photo); }
	}
?>