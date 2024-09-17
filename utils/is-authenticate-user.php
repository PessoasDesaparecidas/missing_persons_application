<?php
include "./database/users-repository.php";
function is_authenticate_user($connection, $id)
{
  $user = find_by_id($connection, $id);
  if ($user) {
    return true;
  }
  return false;
}
