<?php
session_start();
function get_user_id()
{

  $user_id = $_SESSION['user_id'] ?? false;
  if ($user_id) {
    return $user_id;
  }
  return false;
}