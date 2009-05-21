<?php 
  require "./php/header.php";
	require "./php/class.Finders.php";
	require "./php/class.Art.php";

	$finder= new Finders();
	$art= $finder->all_art();

	if( count($art) > 0 )
	{
		include "./php/class.ArtDisplay.php";		
		$art_display= new ArtDisplay;
		$art_display->display_art( $art );
	}
	else
	{
		echo "<p>No art is listed at this time.</p>";		
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
			delete_objects("art");
		});
</script>

<?php 
  require "./php/footer.php";
?>
