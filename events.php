<?php 
require "./php/header.php"; 
?>
<h1>Event Calendar</h1><br />
<?php
// start with previous month
if (!$_REQUEST['mo']) {
  $mo = date("m");
  $yr = date ("Y");
  $mo = $mo - 1;
  if ($mo < 1) {
    $mo = 12;
    $yr = $yr - 1;
  }
}

// show 4 calendars
$MULTI=1;
$epcMultiWidth = "950px";
$epcMultiPad = 10;
$epcMultiNav = "950px";
$epcMultiCol = 4;
$epcMultiRow = 1;
$epcMultiAdv = 2;
require("/home/entree/public_html/calendar/calendar.php"); 

?>
<br />
<?php

// show list of events
$LIST=1;
$listMonths="4";
$DF = "M jS, Y (D)"; 
$template="modern.php";
require("/home/entree/public_html/calendar/calendar.php");

require "./php/footer.php"; 
?>
