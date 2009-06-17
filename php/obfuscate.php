<?php
  function obfuscate($email_address) {
    $chars = str_split($email_address);
    foreach( $chars as $char ) {
      $output .= "&#" .ord($char). ";";
    }
    return $output;
  }

  function email_link($email_address, $link_text=null) {
    if($link_text == null) {
      $link_text = obfuscate($email_address);
    }
    printf("<a href=\"%s\">%s</a>",obfuscate("mailto:".$email_address),$link_text);
  }

?>