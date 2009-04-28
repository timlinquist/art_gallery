<?php
	class Photo {
	  var $file_name;  
		var $thumb_size_folder_path;
		var $full_size_folder_path;

		function __construct($file_name)
		{ 
			$this->file_name= $file_name;
			$this->thumb_size_folder_path= "../photos/thumb_size/";
			$this->full_size_folder_path= "../photos/full_size/";	
		}
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
	
		public function thumb_path()
		{
			return $this->thumb_size_folder_path . $this->file_name;
		}
	
		public function full_size_path()
		{
			return $this->full_size_folder_path . $this->file_name;
		}
	}
?>