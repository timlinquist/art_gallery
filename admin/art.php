<?php 
  require "admin_header.php";
	require "../php/class.Finders.php";
	require "../php/class.Art.php";

	$finder= new Finders();
	$art= $finder->all_art();

	echo "<div style='overflow: hidden; display: block; clear: both;'><a class='button' href='art_form.php' title='add art'>Add an art piece</a></div>";
	
	if( count($art) > 0 )
	{
		require "../php/Paginated.php";
		require "../php/DoubleBarLayout.php";
		include "../php/class.ArtDisplay.php";		
		$art_display= new ArtDisplay(true);
		
		$page= ( isset($_GET['page']) ) ? $_GET['page'] : 1;		
		$pagedResults = new Paginated($art, 10, $page);

		$paginated_results = "<div class='pagination'><ul>";

		while($row = $pagedResults->fetchPagedRow()) {	//when $row is false loop terminates
			$paginated_results .= "<li>". $art_display->display_art_piece( $row ) ."</li>";
		}
		$paginated_results .= "</ul></div>";
		//important to set the strategy to be used before a call to fetchPagedNavigation
		$pagedResults->setLayout(new DoubleBarLayout());
		$paginated_results .= $pagedResults->fetchPagedNavigation();
		
		echo $paginated_results;
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
	require "admin_footer.php"; 
?>
