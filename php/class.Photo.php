<?php
class Photo {
	CONST THUMB_SIZE_FOLDER_PATH= "../photos/thumb_size/";
	CONST FULL_SIZE_FOLDER_PATH= "../photos/full_size/";	
  var $file_name;  

	function __construct($file_name){ $this->file_name= $file_name;	}
	function __get($prop_name){ return $this->$prop_name; }
  function __set($prop_name, $value ){ $this->$prop_name = $value; }
	
	public function thumb_path()
	{
		THUMB_SIZE_FOLDER_PATH.$this->file_name;
	}
	
	public function full_size_path()
	{
		FULL_SIZE_FOLDER_PATH.$this->file_name;
	}
}