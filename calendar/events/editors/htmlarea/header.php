<?php
if (file_exists("../HTMLArea/htmlarea.js") && (isset($_REQUEST['eid']) || isset($_REQUEST['add']))) {
?>
<script type="text/javascript">
  _editor_url = "<?php echo $urlPath ?>/HTMLArea/";
  _editor_lang = "en";
</script>
<script type="text/javascript" src="../HTMLArea/htmlarea.js"></script>
<script type="text/javascript">
var editor = null;
function initEditor() {
  editor = new HTMLArea("descr");
  editor.generate();
  return false;
  }
</script>
<?php
}