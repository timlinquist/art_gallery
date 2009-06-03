<?php require "./php/header.php"; ?>

<h1>Feature Shows</h1>

<h2>Reeder Bay Gallery</h2>
<div class="event_list">
  <?php
    $LIST=1;
    $listWeeks = 52;
    $noOld = 1;    
    $DF = "l, F jS, Y";
    $showCat = "a|12|10";
    $template="modern.php";
    require("/home/entree/public_html/calendar/calendar.php");
  ?>
</div>

<div style="display: block; height: 2em; clear: both;"></div>

<h2>Coolin Bay Gallery</h2>
<div class="event_list">
  <?php
    $LIST=1;
    $listWeeks = 52;
    $noOld = 1;    
    $DF = "l, F jS, Y";
    $showCat = "a|12|8";
    $template="modern.php";
    require("/home/entree/public_html/calendar/calendar.php");
  ?>
</div>



<?php require "./php/footer.php"; ?>
