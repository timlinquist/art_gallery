<?php
// EasyPHPCalendar
// Version 6
// Copyright 2001-2005 NashTech, Inc.
// http://www.EasyPHPCalendar.com

// SET ERROR REPORTING LEVEL
error_reporting(E_ALL ^ E_NOTICE);

if ($epcGetInit!=1) {

// DETERMINE NAME OF CURRENT FILE
if (!isset($thisFile) || (isset($_GET['thisFile']) || isset($_POST['thisFile']))) {
  $thisFile = $_SERVER['SCRIPT_NAME'];
  $thisFile = explode("/",trim($thisFile)); 
  $thisFile = $thisFile[count($thisFile)-1];
  if (!file_exists($thisFile)) $thisFile = htmlentities($_SERVER['PHP_SELF']);
  }

// SERVER (ROOT) PATH TO ESCAL FOLDER
// This address should start and end with a "/" unless this is on a windows server where it will start with a drive letter;
if (!isset($serverPath) || $serverPath!="../" || $getPaths==1) {
$serverPath = $_SERVER['DOCUMENT_ROOT'] . "/calendar/";
}

// URL PATH TO ESCAL FOLDER
// This address should start and end with a "/". *
// It is usually the name of the directory this file is in (Example: "/escal/");
// * If you enter the full URL starting with "http://", this address will not be verified by the calendar script!
$urlPath="/art_gallery/calendar/";

}

if ($getPaths!=1 && $epcGetInit!=1) {

// GET HTML FUNCTIONS
require_once($serverPath."functions/functions.inc.php");

// CURRENT THEME
$currentTheme="default";

// INCLUDE CSS ROUTINE
if ($CSS!="") {

  if (!file_exists($serverPath."config.inc.php")) die ("<font color=red>Server Path Error.</font><br />Please run the Setup Manager to correct this problem.<br /><br />");
  require_once($serverPath."config.inc.php");

  if ($urlPath=="") {
    echo "<link href=\"theme/$currentTheme/esstyle.css\" rel=\"stylesheet\" type=\"text/css\"/>";
	require($serverPath."functions/categories.php");
	}
  else {
    if (!isset($showTheme) && $_REQUEST['showTheme']!="") $showTheme=$_REQUEST['showTheme'];
    if (isset($showTheme)) {
	  $checkTheme = $serverPath."theme/".$showTheme."/esstyle.css";
	  if (file_exists($checkTheme)) {
	    $currentTheme = $showTheme;
		}
	  }
    echo "<link href=\"".$urlPath."theme/$currentTheme/esstyle.css\" rel=\"stylesheet\" type=\"text/css\"/>";
	require($serverPath."functions/categories.php");
	}
  }

if ($PCSS==1) {
  echo "<link href=\"".$urlPath."theme/$currentTheme/popup.css\" rel=\"stylesheet\" type=\"text/css\"/>\n";
  echo "<link href=\"".$urlPath."theme/$currentTheme/esstyle.css\" rel=\"stylesheet\" type=\"text/css\"/>\n";
  require($serverPath."functions/categories.php");
  }

// INCLUDE OVERLIB ROUTINE
if ($OL==1) {
  if (!file_exists($serverPath."config.inc.php")) die ("<font color=red>Server Path Error.</font><br />Please run the Setup Manager to correct this problem.<br /><br />");
  require_once($serverPath."config.inc.php");
  
  // DETERMINE FILENAME
  $olFileName = "overlib.js";
  if (file_exists($serverPath."overLIB/overlib_mini.js")) $olFileName = "overlib_mini.js";
  
  echo "<script type=\"text/JavaScript\">\n";
  if (isset($ol_width)) echo "  var ol_width=$ol_width;\n";
  if (isset($ol_delay)) echo "  var ol_delay=$ol_delay;\n";
  if (isset($ol_fgcolor)) echo "  var ol_fgcolor=\"#$ol_fgcolor\";\n";
  if (isset($ol_bgcolor)) echo "  var ol_bgcolor=\"#$ol_bgcolor\";\n";
  if (isset($ol_offsetx)) echo "  var ol_offsetx=$ol_offsetx;\n";
  if (isset($ol_offsety)) echo "  var ol_offsety=$ol_offsety;\n";
  if (isset($ol_border)) echo "  var ol_border=$ol_border;\n";
  if ($ol_fixx!=0) echo "  var ol_fixx=$ol_fixx;\n";
  if ($ol_fixy!=0) echo "  var ol_fixy=$ol_fixy;\n";
  if ($ol_sticky!=0 || $showTheme=="system") echo "  var ol_sticky=1;\n";
  if ($ol_anchor==1) echo "  var ol_anchor=\"escOL\";";
  if ($ol_anchor==1) echo "  var ol_anchoralign=\"ul\";";
  echo "  var ol_vauto=1;\n";
  echo "</script>\n";
  echo "<div id=\"overDiv\" style=\"position:absolute; visibility:hidden; z-index:1000;\"></div><script type=\"text/JavaScript\" src=\"".$urlPath."overLIB/".$olFileName."\"><!-- overLIB (c) Erik Bosrup --></script>";
  if ($ol_anchor==1) echo "<script src=\"".$urlPath."overLIB/overlib_anchor.js\"></script>";
  }

// DISPLAY EVENT LIST
if ($LIST==1) {
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require ($serverPath."functions/listings.php");
  }

// DISPLAY EVENT LIST
if ($EPCBLOG==1) {
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require ($serverPath."functions/calendar.php");
  }
if ($EPCBLOG==2) {
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require ($serverPath."functions/blog.php");
  }

// DISPLAY TEXT ON CALENDAR
if ($TOC==1) {
  if (!file_exists($serverPath."config.inc.php")) die ("<font color=red>Server Path Error.</font><br />Please run the Setup Manager to correct this problem.<br /><br />");
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require ($serverPath."functions/tocCalendar.php");
  }

// SHOW MULTIPLE CALENDARS
if ($MULTI==1) {
  if (!file_exists($serverPath."config.inc.php")) die ("<font color=red>Server Path Error.</font><br />Please run the Setup Manager to correct this problem.<br /><br />");
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require($serverPath."plugins/multiShow.php");
  $MULTIX=1;
  }

// AJAX JAVASCRIPT
if ($EPCAJAX==1) {
  ?>
<script type="text/javascript">
var EPCmo = <?php if ($_REQUEST['mo']>=1 && $_REQUEST['mo']<=12) echo $_REQUEST['mo']; else echo date("m"); ?>;
var EPCyr = <?php if ($_REQUEST['yr']>=1 && $_REQUEST['yr']<=5000) echo $_REQUEST['yr']; else echo date("Y"); ?>;
function loadurl(dest, EPCnav) { 
try { 
xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): 
new ActiveXObject("Microsoft.XMLHTTP"); 
} 
catch (e) {}
xmlhttp.onreadystatechange = triggered; 
if (EPCnav==2) {EPCmo = <?php echo date("m"); ?>; EPCyr = <?php echo date("Y"); ?>;}
if (EPCnav==1) {EPCmo--; if (EPCmo < 1) {EPCmo = 12; EPCyr --;}}
if (EPCnav==3) {EPCmo++; if (EPCmo > 12) {EPCmo = 1; EPCyr ++;}}
xmlhttp.open("GET", dest + "?mo=" + EPCmo + "&yr=" + EPCyr + "&EPCajax=1"); 
xmlhttp.send(null); } 
function triggered() { 
if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) { 
document.getElementById("EPCcalendar").innerHTML = xmlhttp.responseText; } }
</script>
  <?php
  }

// DISPLAY CALENDAR
if ($CSS=="" && $OL!=1 && $LIST!=1 && $PCSS=="" && $TOC=="" && $MULTIX=="" && $EPCBLOG=="" && $EPCAJAX=="") {
  if (!file_exists($serverPath."config.inc.php")) die ("<font color=red>Server Path Error.</font><br />Please run the Setup Manager to correct this problem.<br /><br />");
  if ($license=="" || !isset($license) || !isset($gmt) || $gmt=="") {require ($serverPath."config.inc.php");}
  require ($serverPath."functions/calendar.php");
  }

// UNSET MODE VARIABLES
unset ($CSS,$PCSS,$OL,$LIST,$TOC,$MULTI,$MULTIX,$EPCAJAX);
}
?>