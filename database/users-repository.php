<?php
function create_user($connection, $username, $email, $password)
{
  $create_user_query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$username}', '{$email}', '{$password}', False)";
  mysqli_query($connection, $create_user_query);
}

function find_by_id($connection, $id)
{
  $query = "SELECT * FROM Usuario WHERE id_usuario = '{$id}'";
  $result = $connection->query($query);

  return $result->fetch_assoc();
}

function find_by_email($connection, $email)
{
  $query = "SELECT * FROM Usuario WHERE email_usuario = '{$email}'";
  $result = $connection->query($query);

  return $result->fetch_assoc();
}