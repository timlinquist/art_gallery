<?php
	class PhotoUploader {
		const THUMB_SIZE_FOLDER_PATH = "../photos/thumb_size/";
		const FULL_SIZE_FOLDER_PATH = "../photos/full_size/";
		var $files;
		
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
		function __construct($files){ $this->files= $files; }
		
		public function upload()
		{
			$full_size_upload = self::FULL_SIZE_FOLDER_PATH . basename($this->files['photo_upload']['name']);

			if(is_uploaded_file($this->files['photo_upload']['tmp_name']))
			{
				if (move_uploaded_file($this->files['photo_upload']['tmp_name'], $full_size_upload)) 
				{
					echo "Photo is valid, and was successfully uploaded.\n";
					return;
				} 
				echo "Unable to upload photo.  Please try to upload the photo again. \n";
			}			
		}
	}
?>