<?php
include "./database/database-connection.php";
include "./utils/populate-database.php";
include "./utils/get-user-id.php";

seed_missings($connection, get_user_id(), 10);