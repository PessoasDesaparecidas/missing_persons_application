<?php

include "./utils/get-user-id.php";
include "./database/database-connection.php";
include "./utils/is-authenticate-user.php";

$is_authenticate_user = is_authenticate_user($connection, get_user_id());

if (!$is_authenticate_user) {
  header('Location: index.php');
}
