<?php
	require('class.SearchFilters.php');
	require_once('class.ArtSearchForm.php');
	require_once('class.ArtDisplay.php');

	foreach( $_POST as $key => $value ) {
	  $_POST[$key] = mysql_real_escape_string(trim($value));
	}

	if(isset($_POST["search"]))
	{
		$search_filter= new SearchFilters($_POST["artist"], $_POST["category"], $_POST["medium"]);
		$art= $search_filter->filter_art_by_all();

		if(count($art) > 0 && count($art) > 10)
		{
			require "Paginated.php";
			require "DoubleBarLayout.php";
			
			$page= ( isset($_GET['page']) ) ? $_GET['page'] : 1;
			$page= ( $page==1 && isset($_POST['page']) ) ? $_POST['page'] : 1;
			
			$paginated_results="";
			$view_all= "<div class=\"pagination_all\"><a class='view_all' href=\"\">view all " . count($art) . " items</a></div>\n</div>\n";

			$query_vars= "&search=true&category=" . $_POST["category"] . "&medium=" . $_POST["medium"] . "&artist=" .  $_POST["artist"];
			$art_display=	new ArtDisplay();			
			//constructor takes three parameters
			//1. array to be paged
			//2. number of results per page (optional parameter. Default is 10)
			//3. the current page (optional parameter. Default  is 1)

      $pagedResults = new Paginated($art, 10, $page);
      //important to set the strategy to be used before a call to fetchPagedNavigation
      $pagedResults->setLayout(new DoubleBarLayout());
      $pagedNavigation= $pagedResults->fetchPagedNavigation( $query_vars );
			
			//Render each art piece
			if(isset($_POST["viewing_all"]) && $_POST["viewing_all"] != '')
			{
				foreach($art as $art_piece) { 
					$paginated_results .= $art_display->display_art_piece($art_piece);				
				}				
			}
			else
			{
				while($row = $pagedResults->fetchPagedRow()) {	//when $row is false loop terminates
					$paginated_results .= $art_display->display_art_piece( $row);
				}
			}
			
			//important to set the strategy to be used before a call to fetchPagedNavigation
			$paginated_results .= $pagedNavigation.$view_all;
			
			echo $paginated_results;				
		}
		elseif(count($art) > 0){
			$art_display=	new ArtDisplay();
			echo $art_display->display_art( $art );			
		}
		else{
			echo "No art was found for the options you selected.";
		}
	}
	elseif( isset($_POST["medium_id"]) && (isset($_POST["category_id"])) )
	{
		$search_filter= new SearchFilters(null, $_POST["category_id"], $_POST["medium_id"]);
		$search_filter->filtered_by_medium();
	}
	elseif(isset($_POST["category_id"]))
	{
		$search_filter= new SearchFilters(null, $_POST["category_id"], null);
		$search_filter->filtered_by_category();
	}
	elseif(isset($_POST["reset"]))
	{
		$search_form = new ArtSearchForm();
		echo $search_form->render_form();
	}
