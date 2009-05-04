<?php
if (file_exists("../spaw/spaw_control.class.php")) {

  $spaw_root = $serverPath."/spaw/";

  // include the control file
  include $spaw_root.'spaw_control.class.php';

  $sw = new SPAW_Wysiwyg('descr' /*name*/,stripslashes($descr) /*value*/);
  $sw->show();
  }
?>