<?php 
	require "../php/class.Finders.php";
  require "admin_header.php";

	$finder= new Finders();
	$mediums= $finder->all_mediums();

	echo "<a href='medium_form.php' title='add medium'>Add a medium</a>";

	if( count($mediums) > 0 )
	{
		include "../php/class.MediumDisplay.php";		
		$medium_display= new MediumDisplay(true);		
		$medium_display->display_mediums( $mediums );
	}
	else
	{
		echo "<p>No mediums exist at this time.</p>";		
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
	  delete_objects("medium");
	});
</script>

<?php 
	require "admin_footer.php"; 
?>
