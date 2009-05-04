<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Easy PHP Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<?php $CSS=1; require("calendar.php"); ?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 9px;
}
-->
</style>
</head>
<body>
<?php $OL=1; require("calendar.php"); ?>
<div align="center">
<span class="style1">[ To modify the design/layout of this page, edit the demo.php file. ]<br />
<br />
<a href="setup/index.php">Setup Manager</a> | <a href="events/index.php">Event Manager</a> | <a href="events/index.php"><a href="http://docs.easyphpcalendar.com/" target="_blank">Instructions</a></a></span><br />
<br />
</div>
<table width="100%" align="center">
  <tr><td align="center">
<?php
// $TOC=1; // UNCOMMENT THIS LINE TO SHOW TEXT ON CALENDAR

//unset($epcAltLink); $epcAltLink="http://www.easyphpcalendar.com/"; // UNCOMMENT THIS LINE TO USE THE ALT LINK FEATURE
require("calendar.php"); 

?>
<br /><br />
<?php
// SHOW LISTINGS MODULE
// $epcListMouseover=1; // WILL USE THE MOUSE-OVER POPUPS FOR LIST MODE
$LIST=1;
$DF = "M jS, Y (D)"; 
$template="modern.php";
require("calendar.php");

// THIS IS AN EXAMPLE OF THE MULTI-CALENDAR GENERATOR
/* // Remove this line to show the multi-calendar // 
$MULTI=1;
$epcMultiWidth = "600px";
$epcMultiPad = 10;
$epcMultiNav = "580px";
$epcMultiCol = 3;
$epcMultiRow = 2;
require("calendar.php"); 
*/ // Remove this line to show the multi-calendar //

?>
</td>
<td width="0" align="left" valign="top">
<a name="escOL">&nbsp;</a>
</td>
</tr></table>
</body>
</html>