<?php 
  require "./php/header.php";
  require "./php/class.ArtistFinders.php";
	require "./php/class.ArtistForm.php";
	if($_GET['artist'] != '')
	{
		$artist_finder= new ArtistFinders();
		$artist= $artist_finder->find_artist($_GET['artist']);	
		$artist_form= new ArtistForm($artist, false);
	}
	else
	{
		$artist_form= new ArtistForm();		
	}
	$artist_form->render();
	require "./php/footer.php"; 
?>
<script type="text/javascript" src="/javascript/form.js"></script>
