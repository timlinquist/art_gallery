<?php
	class Photo {
	  var $file_name;  

		function __construct($file_name){ $this->file_name= $file_name;	}
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
	
		public function thumb_path()
		{
			//Why can't I concatenate a constant here?  I want these paths to be CONSTANTS ugh! :-(
			$thumb_size_folder_path= "../photos/thumb_size/";
			return "$thumb_size_folder_path$this->file_name";
		}
	
		public function full_size_path()
		{
			$full_size_folder_path= "./photos/full_size/";
			return "$full_size_folder_path$this->file_name";
		}
	}
?>