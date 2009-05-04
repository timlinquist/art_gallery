<!--head-->
<style type="text/css">
<!--
.tableListings {
	width: 480px;
	border: 1px solid #006699;
	margin: 0px;
	padding: 0px;
}
.tableDate {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	text-align: left;
	vertical-align: middle;
	font-weight: normal;
	padding: 2px;
}
.tableTitle {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #004262;
	text-align: left;
	vertical-align: middle;
	font-weight: bold;
	padding: 2px;
}
.tableCategory {
	width: 8px;
}
.tableDescr {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #383838;
	text-align: left;
	vertical-align: middle;
	font-weight: normal;
}
.tableTime {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #295569;
	font-weight: normal;
}
.newDate {color: #FFFFFF; font-weight: bold; font-size: 12px; }
.newTime {color: #CCCCCC; font-weight: bold; font-size: 12px; }
-->
</style>
<!--head-->

<!--date-->
<table width="100%"  border="0" cellpadding="1" cellspacing="0" bgcolor="#276983" class="tableListings">
  <tr class="tableDate">
    <td><span class="newDate">[date]</span>      <div align="right" class="newTime"></div></td>
  </tr>
</table>
<br />
<!--date-->

<!--body-->
<table class="tableListings" [mouseover]>
  <tr>
    <td width="12" align="left" valign="top" class="tableCategory s2[category]">&nbsp;</td>
    <td align="left" valign="top" bgcolor="#FFFDF2" class="tableTitle"><p>[title]<br>
        <span class="tableDescr">[categories][descr][time]</span></p>
    </td>
  </tr>
</table>
<br />
<!--body-->

<!--foot-->

<!--foot-->

<!--empty-->
<table border="0" class="tableListings tableTime">
  <tr>
    <td bgcolor="#FFFDF2"><center>There are no entries to display for this day.</center></td>
  </tr>
</table>
<!--empty-->