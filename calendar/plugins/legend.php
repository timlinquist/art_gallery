<?php 
///////////////////////////////////////////////
// DISPLAY MAIN CATEGORIES LEGEND /////////////
///////////////////////////////////////////////
/*
This plugin will display a legend of the main category selections and their colors.
*/

if (!isset($epcCategories) || $epcCategories=="" || isset($_REQUEST['epcCategories'])) exit;

$epcCat = explode("-||-",$epcCategories);

// DISCARD ARRAY KEY INFORMATION
$epcHighKeyX = explode("|",array_pop($epcCat));

// ASSIGN EACH CATEGORY WTTH SELECTIONS TO AN ARRAY
if (count($epcCat)>0) {

  // RESET COUNTER
  $epcCatCount = 0;

  foreach ($epcCat as $epcValue) {
    if ($epcValue!="") {
	  $epcCategoryHolder[$epcCatCount] = $epcValue;
	  $epcCatCount++;
      }
    }
  }

  // SHOW CATEGORY
  $epcValue = $epcCategoryHolder[0];

  $epcCatFull = explode("|",$epcValue);

  // SET CATEGORY NAMES
  $epcCatNameSet = $epcCatFull[1];
  $epcCatNameSet = explode("[",$epcCatNameSet);
  $epcCategoryNames[$epcCatNameSet[1]] = $epcCatNameSet[0];

  // SHORTEN SELECTIONS ARRAY
  array_shift($epcCatFull);
  array_shift($epcCatFull);

  // SORT SELECTIONS
  asort($epcCatFull);
  reset($epcCatFull);

  //////////////////////
  // BEGIN TABLE CODE //
  //////////////////////
?>
<style type="text/css">
<!--
.ledCatName {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	text-align: left;
}
-->
</style>

<table width="200">
<?php

  // SET SELECTIONS NAMES
  foreach ($epcCatFull as $key) {
    $epcSelFull = explode("[",$key);
	if ($epcSelFull[0]!="") {

      ?>
	  <tr><td width="15" class="s2<?php echo $epcSelFull[1]; ?> ledCatName">&nbsp;</td>
	  <td><span class="ledCatName"><?php echo $epcSelFull[0]; ?></span></td></tr>
      <?php
	  }
    }

// SHOW MULTI-EVENTS COLOR
if ($epcMultiCatShow==1) {
   ?>
	<tr><td width="15" class="s29999 ledCatName">&nbsp;</td>
	<td><span class="ledCatName">Multiple Categories</span></td></tr>
    <?php
  }

?>
</table>
