<?php
session_start();
include "./utils/get-user-id.php";
include "./database/database-connection.php";
include "./utils/is-authenticate-user.php";
include "./utils/sonner.php";

$is_authenticate_user = is_authenticate_user($connection, get_user_id());

if (!$is_authenticate_user) {
  sonner('error', 'credencias envalidas');
  header('Location: index.php');
}
