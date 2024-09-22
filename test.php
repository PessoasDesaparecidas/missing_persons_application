<?php
include "./database/database-connection.php";
include "./utils/populate-database.php";
include "./utils/get-user-id.php";

// seed_missings($connection, get_user_id(), 10);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <select name="local_desaparecimento" id="local_desaparecimento" required>
        <option value="zona central">
            zona central
        </option>
        <option value="zona norte">zona
            norte</option>
        <option value="zona sul">zona sul
        </option>
        <option value="zona oeste">zona
            oeste</option>
        <option value="zona leste">zona
            leste</option>
    </select>
</body>

</html>