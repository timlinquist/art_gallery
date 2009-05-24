<!--<form enctype="multipart/form-data" action="./php/controller.php" method="POST" class='photo_upload'>
	<input id='action' name='action' type='hidden' value='upload_photo' />
	<label name='photo_upload'>Upload Photo:</label> <input name="photo_upload" type="file" />		
	<input type="submit" value="Upload" />
</form>-->

<div id='photo_upload_container'>
	<p>
		<a id="upload_link" style="font-size: 24px;" href="#">Click here to upload a photo</a>
	</p>
	<div id="upload_status"></div>
	<span id="loader"><img src="images/loader.gif" alt="Loading..."/></span>
	<br />
	<div id="uploaded_image"></div>
</div>
