<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Easy PHP Calendar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<?php $CSS=1; require("calendar.php"); ?>
<style type="text/css">
<!--
.style1 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<table width="700" border="1" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td colspan="2" align="center" valign="top" bgcolor="#006633"><span class="style1">Blog Mode Demo Page </span></td>
  </tr>
  <tr>
    <td width="205" align="center" valign="top" bgcolor="#FFFFFF"><?php
$EPCBLOG=1;
require("calendar.php"); 
?></td>
    <td align="center" valign="top" bgcolor="#F2F2F2"><?php
$EPCBLOG=2;
$template="blog.php";
$DF = "l, F j, Y"; 
require("calendar.php"); 
?></td>
  </tr>
</table>
</body>
</html>