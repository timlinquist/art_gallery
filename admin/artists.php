<?php 
  require "admin_header.php";
	require "../php/class.Finders.php";

	$finder= new Finders();
	$artists= $finder->all_artists();

	echo "<a href='artist_form.php' title='add artist'>Add an artist</a>";

	if( count($artists) > 0 )
	{
		require "../php/Paginated.php";
		require "../php/DoubleBarLayout.php";
		include "../php/class.ArtistDisplay.php";		
		
		$artist_display= new ArtistDisplay(true);
		
		$page= ( isset($_GET['page']) ) ? $_GET['page'] : 1;		
		$pagedResults = new Paginated($artists, 10, $page);

		$paginated_results = "<ul>";

		while($row = $pagedResults->fetchPagedRow()) {	//when $row is false loop terminates
			$paginated_results .= "<li>". $artist_display->display_artist( $row) ."</li>";
		}
		$paginated_results .= "</ul>";
		//important to set the strategy to be used before a call to fetchPagedNavigation
		$pagedResults->setLayout(new DoubleBarLayout());
		$paginated_results .= $pagedResults->fetchPagedNavigation();
		
		echo $paginated_results;
	}
	else
	{
		echo "<p>No artists are listed at this time.</p>";		
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
			delete_objects("artist");
			lightbox_photos();			
		});
</script>

<?php 
	require "admin_footer.php"; 
?>
