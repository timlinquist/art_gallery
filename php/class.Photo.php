<?php
class Photo {
	CONST THUMB_SIZE_FOLDER_PATH= "../photos/thumb/";
	CONST FULL_SIZE_FOLDER_PATH= "../photos/full/";
	
  var $file_name;  
	function __construct($file_name)
	{
		 $this->file_name= $file_name;	
	}
	function get_file_name(){ return $this->file_name; }
  function set_file_name( $val ){ $this->file_name = $val; }
  
	
	public function thumb_path()
	{
		THUMB_SIZE_FOLDER_PATH.$this->file_name;
	}
	
	public function full_size_path()
	{
		FULL_SIZE_FOLDER_PATH.$this->file_name;
	}
}