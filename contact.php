<?php require "./php/header.php"; ?>

<div id="galleries">
<?php
	foreach( $GLOBALS['galleries'] as $gallery )	
	{	 
		echo $gallery;
	}
?>
</div>
<?php require "./php/footer.php"; ?>
