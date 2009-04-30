<?php require("header.php") ?>
<?php
	require( "class.ArtistFinders.php" );
	require( "class.EditArtistForm.php" );
	$artist_finder= new ArtistFinders();
	$artist= $artist_finder->find_artist($_GET['artist']);	
	$artist_form= new EditArtistForm($artist);
	$artist_form->render();
?>
<?php require("footer.php") ?>
<script type="text/javascript" src="../javascript/form.js"></script>
