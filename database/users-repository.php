<?php
function create_user($connection, $username, $email, $password, $user_photo)
{
  $preparement_query_to_create_user = $connection->prepare(
    "INSERT INTO User (username, user_email, user_password, user_photo , is_banned)
     VALUES (?, ?, ?, ?, False)"
  );

  $preparement_query_to_create_user->bind_param("ssss", $username, $email, $password, $user_photo);

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

function delete_all_users($connection)
{
  $preparement_query_to_delete_all_users = $connection->prepare("DELETE FROM User");

  $preparement_query_to_delete_all_users->execute();
  $preparement_query_to_delete_all_users->close();
}