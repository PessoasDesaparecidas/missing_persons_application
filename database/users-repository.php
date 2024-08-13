<?php
function create_user($connection, $username, $email, $password)
{
  $create_user_query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$username}', '{$email}', '{$password}', False)";
  $result  = mysqli_query($connection, $create_user_query);
  if (mysqli_num_rows($result) > 0) {
    return true;
  } else {
    return false;
  }
}

function find_by_id($connection, $id)
{
  $query = "SELECT * FROM Usuario WHERE id_usuario = '{$id}'";
  $result = $connection->query($query);

  return $result->fetch_assoc();
}

function find_by_email($connection, $email)
{
  $query = "SELECT id_usuario, email_usuario, nome_usuario FROM Usuario WHERE email_usuario = '{$email}'";
  $result = $connection->query($query);

  return $result->fetch_assoc();
}
