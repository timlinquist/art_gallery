<?php
class DoubleBarLayout implements PageLayout {
	const LINK_CLASS = "pagination";
	
	public function fetchPagedLinks($parent, $queryVars, $is_async=false) {
		$currentPage = $parent->getPageNumber();
		$str = "<div id='pagination_wrapper'>\n<div id='paged_links'>\n<ul>";
		//write statement that handles the previous and next phases
	   	//if it is not the first page then write previous to the screen
		if(!$parent->isFirstPage()) {
			$previousPage = $currentPage - 1;
			$str .= "<li id=\"pagination_prev\"><a class='". self::LINK_CLASS. "' href=\"?page=$previousPage$queryVars\">&larr; prev</a></li>";
		}
		else{
			$str .= "<li id=\"pagination_prev\"><a class='disabled' href=\"#\">&larr; prev</a></li>";			
		}

		for($i = $currentPage - $parent->fetchNumberPages(); $i <= $parent->fetchNumberPages(); $i++) { 
			if($i < 1) { continue; }
			if($i > $parent->fetchNumberPages()) { break; }
			if($i == $currentPage) { 	
				$str .= "<li><a class=\"current\" href=\"#\">$i</a></li>"; 
			}
			else { 
				$str .= "<li><a class='". self::LINK_CLASS. "' href=\"?page=$i$queryVars\">$i</a></li>"; 
			}
		}

		if(!$parent->isLastPage()) {
			$nextPage = $currentPage + 1;
			$str .= "<li id=\"pagination_next\"><a class='". self::LINK_CLASS. "' href=\"?page=$nextPage$queryVars\">next &rarr;</a></li>";
		}
		else{
			$str .= "<li id=\"pagination_next\"><a class='disabled' href=\"#\">next &rarr;</a></li>";
		}
		
		$str .= "</ul>\n</div>\n";
		return $str;
	}
}
?>