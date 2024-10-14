<?php
function get_missing_id()
{

  $missing_id = $_GET['missing_id'] ?? false;
  if ($missing_id) {
    return $missing_id;
  }
  return false;
}