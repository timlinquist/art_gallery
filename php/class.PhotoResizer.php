<?php
/*
JPEG / PNG Image Resizer
Parameters (passed via URL):

photo = path / url of jpeg or png image file

percent = if this is defined, image is resized by it's
          value in percent (i.e. 50 to divide by 50 percent)

w = image width

h = image height

constrain = if this is parameter is passed and w and h are set
            to a size value then the size of the resulting image
            is constrained by whichever dimension is smaller

Requires the PHP GD Extension

Outputs the resulting image in JPEG Format

By: Michael John G. Lopez - www.sydel.net
*/
	class PhotoResizer
	{
		const THUMB_SIZE_FOLDER_PATH = "../photos/thumb_size/";
		var $photo;
		var $file_name;
		var $percent;
		var $constrain;
		var $w;
		var $h;
		
		function __get($prop_name){ return $this->$prop_name; }
	  function __set($prop_name, $value ){ $this->$prop_name = $value; }
		function __construct($photo, $file_name, $percent=40, $constrain=null, $w=null, $h=null)
		{ 
			$this->photo= $photo;
			$this->file_name=$file_name; 
			$this->percent= $percent;
			$this->constrain= $constrain;
			$this->w=$w;
			$this->h=$h;
		}
		
		public function resize()
		{
			$x	= @getimagesize($this->photo);
			// image width
			$sw = $x[0];
			// image height
			$sh = $x[1];
		

			if ($this->percent > 0) {
				// calculate resized height and width if percent is defined
				$this->percent = $this->percent * 0.01;
				$this->w = $sw * $this->percent;
				$this->h = $sh * $this->percent;
			}
			else 
			{
				if (isset ($this->w) AND !isset ($this->h)) {
					// autocompute height if only width is set
					$this->h = (100 / ($sw / $this->w)) * .01;
					$this->h = @round ($sh * $this->h);
				} elseif (isset ($this->h) AND !isset ($this->w)) {
					// autocompute width if only height is set
					$this->w = (100 / ($sh / $this->h)) * .01;
					$this->w = @round ($sw * $this->w);
				} elseif (isset ($this->h) AND isset ($this->w) AND isset ($this->constrain)) {
					// get the smaller resulting image dimension if both height
					// and width are set and $constrain is also set
					$hx = (100 / ($sw / $this->w)) * .01;
					$hx = @round ($sh * $hx);

					$wx = (100 / ($sh / $this->h)) * .01;
					$wx = @round ($sw * $wx);

					if ($hx < $this->h) {
						$this->h = (100 / ($sw / $this->w)) * .01;
						$this->h = @round ($sh * $h);
					} else {
						$this->w = (100 / ($sh / $this->h)) * .01;
						$this->w = @round ($sw * $this->w);
					}
				}
			}

			$im = @ImageCreateFromJPEG ($this->photo) or // Read JPEG Image
			$im = @ImageCreateFromPNG ($this->photo) or // or PNG Image
			$im = @ImageCreateFromGIF ($this->photo) or // or GIF Image
			$im = false; // If image is not JPEG, PNG, or GIF
						
			if ($im) 
			{
				if(@ImageCreateFromJPEG ($this->photo)){
					$type= "jpeg";
				}
				elseif(@ImageCreateFromPNG ($this->photo)){
					$type= "png";
				}
				elseif(@ImageCreateFromGIF ($this->photo)){
					$type= "gif";
				}
				else{
					$type= "";
				}
				
				// Create the resized image destination
				$thumb = ImageCreateTrueColor ($this->w, $this->h);
				// Copy from image source, resize it, and paste to image destination
				ImageCopyResampled ($thumb, $im, 0, 0, 0, 0, $this->w, $this->h, $sw, $sh);
				$final_thumb_img = self::THUMB_SIZE_FOLDER_PATH . $this->file_name;
				
				switch ($type)
				{
					case "png":
			  		imagepng($thumb, $final_thumb_img ); 
					break;
					case "jpeg":
						imagejpeg($thumb, $final_thumb_img );
					break;
					case "gif":
						imagegif($thumb, $final_thumb_img);
					break;					
				}
		  	imagedestroy($im);
				return true;
			}	
			return false; //Assume failure unless dir & resize are created
		}
	}
?>