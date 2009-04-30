<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Easy PHP Calendar AJAX Demonstration</title>
<?php $CSS=1; require ("calendar.php"); ?>
<?php $EPCAJAX=1; require ("calendar.php"); ?>
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
body,td,th {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<?php $OL=1; require ("calendar.php"); ?>

<div align="center"><strong>Easy PHP Calendar AJAX Demonstration</strong></div>

<p align="center">The content on this page doesn't reload when navigating using the AJAX links below.
  <br /><br />
  <em><strong>Only the calendar will change!</strong></em>
  <br /><br />
Page loaded at <?php echo date("i")." minutes and ".date("s")." seconds..."; ?></p>

<div id="EPCcalendar" align="center">
<?php $EPCajax=1; require ("calendar.php"); ?>
</div> 

</body>
</html>
