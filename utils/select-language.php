<?php
$language = "pt";

if (isset($_GET["lg"])) {
  switch ($_GET["lg"]) {
    case 'en':
      $language = "en";
      break;
    case 'es':
      $language = "es";
      break;
    default:
      $language = "pt";
      break;
  }
}