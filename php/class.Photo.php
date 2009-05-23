<?php
	class Photo {
	  var $file_name;  
		const THUMB_SIZE_FOLDER_PATH = "../photos/thumb_size/";
		const FULL_SIZE_FOLDER_PATH = "../photos/full_size/";

		function __construct($file_name){ $this->file_name= $file_name; }
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
	
		public function thumb_path()
		{
			return self::THUMB_SIZE_FOLDER_PATH . $this->file_name;
		}
	
		public function full_size_path()
		{
			return self::FULL_SIZE_FOLDER_PATH . $this->file_name;
		}
	}
?>