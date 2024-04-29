<?php
function find_by_email_and_password(string $email, string $password, $connection)
{
    $query = "SELECT * FROM Usuario WHERE email_usuario = '$email' AND senha_usuario = '$password'";

    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}
function all_users($connection): void
{
    $query = "SELECT * FROM Usuario";
    $result = $connection->query($query);
    return $result->fetch_assoc();
}


?>