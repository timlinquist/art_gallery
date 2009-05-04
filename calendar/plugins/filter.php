<?php 
//////////////////////////////////////////////////
// DISPLAY MAIN CATEGORIES DROP-DOWN /////////////
//////////////////////////////////////////////////
/*
This plugin will display a single drop-down menu with the Main Category selections.
*/

if (!isset($epcCategories) || $epcCategories=="" || isset($_REQUEST['epcCategories'])) exit;

$epcCat = explode("-||-",$epcCategories);

// DISCARD ARRAY KEY INFORMATION
$epcHighKeyX = explode("|",array_pop($epcCat));

// ASSIGN EACH CATEGORY WTTH SELECTIONS TO AN ARRAY
if (count($epcCat)>0) {

  // RESET COUNTER
  $epcCatCount = 0;

  while (list($key, $epcValue) = each($epcCat)) {
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

  // DISPLAY CATEGORY NAME
  //echo $epcCatNameSet[0].": ";

  // SHORTEN SELECTIONS ARRAY
  array_shift($epcCatFull);
  array_shift($epcCatFull);

  // SORT SELECTIONS
  asort($epcCatFull);
  reset($epcCatFull);

  // SHOW DROP DOWN FORM
  ?>
<form action="<?php echo $thisFile ?>" method="get" name="FilterForm" id="FilterForm">
<select name="showCat" id="showCat">
<option value="">Show All</option>
<?php

  // SET SELECTIONS NAMES
  while (list($keyX, $key) = each($epcCatFull)) {
    $epcSelFull = explode("[",$key);
	if ($epcSelFull[0]!="") {

      echo "<option value=\"$epcSelFull[1]\"";
      if ($_REQUEST['showCat']==$epcSelFull[1]) echo " selected";
      echo ">".$epcSelFull[0]."</option>";
	  }
    }
?>
</select>
<?php
// CHECK ev IS VALID
if (isset($_REQUEST['ev'])) {
  if (!is_numeric($_REQUEST['ev']) || $_REQUEST['ev']<1) $_REQUEST['ev']="";
  }

// CHECK mo AND yr ARE VALID
if (!isset($mo)) $mo=$_REQUEST['mo'];
if (!isset($yr)) $yr=$_REQUEST['yr'];
if (!is_numeric($mo)) unset($mo);
if ($mo<1 || $mo>12) unset($mo);
if (!is_numeric($yr)) unset($yr);
if ($yr < "-4712" || $yr > 3267) unset($yr);
?>
<input type="submit" name="Submit" value="Filter">
<input name="mo" type="hidden" id="mo" value="<?php echo $mo ?>" />
<input name="yr" type="hidden" id="yr" value="<?php echo $yr ?>" />
<input name="ev" type="hidden" id="ev" value="<?php echo $_REQUEST['ev'] ?>" />
</form>