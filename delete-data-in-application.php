<?php
include "./database/database-connection.php";
include "./database/users-repository.php";
include "./database/missings-repository.php";
include "./database/comments-repository.php";



if ($database == "test") {
    delete_all_comments($connection);
    delete_all_missings($connection);
    delete_all_users($connection);
    echo "All data deleted";
} else {
    echo "You can only delete data from the test database";
}

header("Location: index.php");
