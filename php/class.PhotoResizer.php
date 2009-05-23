<?php
//  require_once "db_connect.php";
	class ImageResizer 
	{
  	var $public_dir = "/home/k3str3l/uploads";
	  var $private_dir, $file_name, $thumb_size, $large_size = NULL;

	  function __construct($user_file, $size = 150) {
	    $private_dir = $user_folder;
	    $file_name = $user_file;
	    $thumb_size = $thumbnail;
	    $large_size = $large;
	  }

	  function is_writable() {
	    return "0777" == substr(sprintf('%o', fileperms($this->public_dir)), -4);
	  }

	  /*********************************************************
	  	Function resize_image($name,$filename,$new_w,$new_h)
	  	creates a resized image in the original aspect-ratio
	  	variables:
	  	$name		Original filename (with path?)
	  	$filename	Filename of the resized image
	  	$new_size		max width / height of resized image
	  ************************************************************/	
	  function resize_image($name,$resized_name,$new_size)
	  {
	    $new_w = $new_size;
	    $new_h = $new_size;
	  	$system=explode(".",$name);
	  	if (preg_match("/jpg|jpeg/",$system[1])){$src_img=imagecreatefromjpeg($name);}
	  	if (preg_match("/png/",$system[1])){$src_img=imagecreatefrompng($name);}
	  	$old_x=imageSX($src_img);
	  	$old_y=imageSY($src_img);
	  	if ($old_x > $old_y) 
	  	{
	  		$thumb_w=$new_w;
	  		$thumb_h=$old_y*($new_h/$old_x);
	  	}
	  	if ($old_x < $old_y) 
	  	{
	  		$thumb_w=$old_x*($new_w/$old_y);
	  		$thumb_h=$new_h;
	  	}
	  	if ($old_x == $old_y) 
	  	{
	  		$thumb_w=$new_w;
	  		$thumb_h=$new_h;
	  	}
	  	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	  	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
	  	if (preg_match("/png/",$system[1]))
	  	{
	  		imagepng($dst_img,$resized_name); 
	  	} else {
	  		imagejpeg($dst_img,$resized_name); 
	  	}
	  	imagedestroy($dst_img); 
	  	imagedestroy($src_img); 
	  }
	}
?>