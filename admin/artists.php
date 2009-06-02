<?php 
  require "admin_header.php";
	require "../php/class.Finders.php";

	$finder= new Finders();
	$artists= $finder->all_artists();

	echo "<a class='button' href='artist_form.php' title='add artist'>Add an artist</a>";

	if( count($artists) > 0 )
	{
		require "../php/Paginated.php";
		require "../php/DoubleBarLayout.php";
		include "../php/class.ArtistDisplay.php";		
		
		$artist_display= new ArtistDisplay(true);
		
		$page= ( isset($_GET['page']) ) ? $_GET['page'] : 1;		
		$pagedResults = new Paginated($artists, 10, $page);

		$paginated_results = "<div class='pagination'><ul>";

		while($row = $pagedResults->fetchPagedRow()) {	//when $row is false loop terminates
			$paginated_results .= "<li>". $artist_display->display_artist( $row) ."</li>";
		}
		$paginated_results .= "</ul>";
		//important to set the strategy to be used before a call to fetchPagedNavigation
		$pagedResults->setLayout(new DoubleBarLayout());
		$paginated_results .= $pagedResults->fetchPagedNavigation();
		
		echo $paginated_results."</div>";
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

      $("a.show_hide_link").click( function() {
        id_parts = this.id.split('_');
        artist_element_id = "p#artist_" + id_parts[1] + "_" + id_parts[2];
        $(artist_element_id).toggle('slow');
      });

	});
</script>

<?php 
	require "admin_footer.php"; 
?>
