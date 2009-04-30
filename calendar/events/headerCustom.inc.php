<?php
// THE CODE BELOW WHEN INSERTED INTO THE calendar/events/headerCustom.inc.php FILE
// WILL DISPLAY THE CALENDAR STARTING AT THE CURRENT MONTH AND NOT THE PREVIOUS MONTH
if (!$_REQUEST['mo'] && !$mo && ($_SESSION['mo']<1 || $_SESSION['mo']>12)) {
$mo = date("m");
$yr = date("Y");
  $mo++;
  if ($mo>12) {
    $mo=1;
    $yr++;
    }
  $_REQUEST['mo'] = $mo;
  $_REQUEST['yr'] = $yr;
  }
?>