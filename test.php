<?php
include "./database/database-connection.php";
include "./utils/populate-database.php";
include "./utils/get-user-id.php";

// seed_missings($connection, get_user_id(), 10);

$sql = 'item1,item2,item3';

$array = explode(',', $sql);


foreach ($array as $key) {
  print_r($key);
  echo "<br>";
}