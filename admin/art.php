<?php 
  require "admin_header.php";
	require "../php/class.Finders.php";
	require "../php/class.Art.php";

	$finder= new Finders();
	$art= $finder->all_art();

	echo "<a href='art_form.php' title='add art'>Add an art piece</a>";
	
	if( count($art) > 0 )
	{
		include "../php/class.ArtDisplay.php";		
		$art_display= new ArtDisplay(true);
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
			lightbox_photos();			
		});
</script>

<?php 
	require "admin_footer.php"; 
?>
