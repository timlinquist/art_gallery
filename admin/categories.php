<?php 
  require "admin_header.php";
	require "../php/class.Finders.php";

	$finder= new Finders();
	$categories= $finder->all_categories();

	echo "<a href='category_form.php' title='add category'>Add a category</a>";

	if( count($categories) > 0 )
	{
		include "../php/class.CategoryDisplay.php";		
		$category_display= new CategoryDisplay;		
		$category_display->display_categories( $categories );
	}
	else
	{
		echo "<p>No categories have been created yet.</p>";		
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		delete_objects("category");
	});
</script>
<?php 
	require "admin_footer.php"; 
?>
