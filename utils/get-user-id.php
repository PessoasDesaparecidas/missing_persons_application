<?php
session_start();
function get_user_id()
{
  $usuer_id = $_SESSION['user_id'];
  return $usuer_id;
}
