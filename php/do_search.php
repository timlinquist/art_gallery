<?php
	require('class.SearchFilters.php');
	require_once('class.ArtSearchForm.php');
	require_once('class.ArtDisplay.php');

	foreach( $_POST as $key => $value ) {
	  $_POST[$key] = mysql_real_escape_string(trim($value));
	}

	if(isset($_POST["category_id"]))
	{
		$search_filter= new SearchFilters(null, $_POST["category_id"], null);
		$search_filter->filtered_by_category();
	}
	elseif(isset($_POST["medium_id"]))
	{
		$search_filter= new SearchFilters(null, null, $_POST["medium_id"]);
		$search_filter->filtered_by_medium();
	}
	elseif(isset($_POST["artist_id"]))
	{
		$search_filter= new SearchFilters($_POST["artist_id"], null, null);
		$search_filter->filtered_by_artist();
	}
	elseif(isset($_POST["reset"]))
	{
		$search_form = new ArtSearchForm();
		echo $search_form->render_form();
	}
	elseif(isset($_POST["search"]))
	{
		$search_filter= new SearchFilters($_POST["artist"], $_POST["category"], $_POST["medium"]);
		$art= $search_filter->filter_art_by_all();
		if(count($art) > 0 && count($art) <= 10)
		{
			$art_display=	new ArtDisplay();
			echo $art_display->display_art( $art );						
		}
		elseif(count($art) > 0){
			$art_display=	new ArtDisplay();
			echo $art_display->display_art( $art );			
		}
		else{
			echo "No art was found for the options you selected.";
		}
	}
