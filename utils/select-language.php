<?php
$leanguage = "pt";

if (isset($_GET["lg"])) {
  switch ($_GET["lg"]) {
    case 'en':
      $leanguage = "en";
      break;
    case 'es':
      $leanguage = "es";
      break;
    default:
      $leanguage = "pt";
      break;
  }
}