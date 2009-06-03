<!--head-->
<style type="text/css">
<!--
.tableListings {
	width: 950px;
	border: 1px solid #551413;
	margin: 0px;
	padding: 0px;
  background: #c0ae95;
}
.tableDate {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 100%;
	color: #000000;
	width: 180px;
	text-align: left;
	vertical-align: middle;
	font-weight: normal;
	padding: 2px 14px;
  background: #807973;
}
.tableTitle {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 100%;
	color: #551413;
	width: 950px;
	text-align: left;
	vertical-align: middle;
	font-weight: normal;
	padding: 2px 4px;
}
.tableCategory {
	width: 8px;
	border-right: 1px solid #551413;
}
span.tableDescr {
	font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 85%;
  color: #000;
}
span.tableDescr div {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 110%;
	color: #333;
	text-align: left;
	vertical-align: middle;
	font-weight: normal;
}
span.tableDescr div strong {
  color: #333;
  font-weight: bold;
}
.tableTime {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 100%;
	color: #295569;
	font-weight: normal;
	padding: 2px 4px;
}
.newDate {color: #fff; font-weight: normal; font-size: 110%; padding: 0 15px; line-height: 1.5em;}
.newTime {color: #fff; font-weight: normal; font-size: 110%; padding: 0 15px; line-height: 1.5em;}
.left { text-align: left; }
.right { text-align: right; }
-->
</style>
<!--head-->


<!--body-->
<table width="100%" cellpadding="1" cellspacing="0" class="tableListings">
  <tr class="tableDate">
    <td width="75%"><span class="newDate">[date]</span></td>
    <td class="right"><div class="newTime">[time]</div></td>
  </tr>
</table>
<table class="tableListings" [mouseover]>
  <tr>
    <td width="15" valign="top" class="tableCategory s2[category]">&nbsp;</td>
    <td valign="top" class="tableTitle">[title]<br>
    <span class="tableDescr">[categories][descr]</span></td>
  </tr>
</table>
<!--body-->

<!--foot-->

<!--foot-->

<!--empty-->
<table border="0" class="tableListings tableTime">
  <tr>
    <td bgcolor="#FFFDF2"><center>There are no events to display for this time period.</center></td>
  </tr>
</table>
<!--empty-->