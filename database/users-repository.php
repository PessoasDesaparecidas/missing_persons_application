<?php
function create_user($connection, $username, $email, $password)
{
  $preparement_query_to_create_user = $connection->prepare(
    "INSERT INTO User (username, user_email, user_password, is_banned)
     VALUES (?, ?, ?, False)"
  );
  $preparement_query_to_create_user->bind_param("sss", $username, $email, $password);
  $preparement_query_to_create_user->execute();
  $preparement_query_to_create_user->close();
}

function find_by_id($connection, $id)
{
  $preparement_query_to_find_user_by_id = $connection->prepare("SELECT * FROM User WHERE user_id = ?");
  $preparement_query_to_find_user_by_id->bind_param("s", $id);
  $preparement_query_to_find_user_by_id->execute();
  $result = $preparement_query_to_find_user_by_id->get_result();
  return $result->fetch_assoc();
}

function find_by_email($connection, $email)
{
  $preparement_query_to_find_user_by_email = $connection->prepare("SELECT * FROM User WHERE user_email = ?");
  $preparement_query_to_find_user_by_email->bind_param("s", $email);
  $preparement_query_to_find_user_by_email->execute();
  $result = $preparement_query_to_find_user_by_email->get_result();
  return $result->fetch_assoc();
}
