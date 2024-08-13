<?php
session_start();
function authenticate_user($id, $conn)
{
  $user_id = $_SESSION['user_id'] ?? '';

  $select_user_query = "SELECT id_usuario FROM WHERE id_usuario = " . $user_id . " ";
  $select_user_result = mysqli_query($conn, $select_user_query);
  if (mysqli_num_rows($select_user_result) > 0) {
    return true;
  } else {
    return false;
  }
}
