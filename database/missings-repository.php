<?php

function create_missing(
  $connection,
  $user_id,
  $missing_person_name,
  $missing_person_gender,
  $missing_person_photo,
  $missing_police_report,
  $missing_person_contact,
  $missing_person_story,
  $missing_person_note,
  $missing_date,
  $missing_person_age,
  $missing_location,
  $illnesses,
  $chemical_dependency,
  $profile,
  $car_plate
) {
  $preparement_query_to_create_missing = $connection->prepare("INSERT INTO MissingPerson 
(user_id, missing_person_name, missing_person_gender, missing_person_photo, missing_police_report,  missing_person_contact, missing_person_story, missing_person_note, missing_date, missing_person_age, missing_location, illnesses, profile, car_plate, chemical_dependency)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  $preparement_query_to_create_missing->bind_param(
    "sssssssssssssss",
    $user_id,
    $missing_person_name,
    $missing_person_gender,
    $missing_person_photo,
    $missing_police_report,
    $missing_person_contact,
    $missing_person_story,
    $missing_person_note,
    $missing_date,
    $missing_person_age,
    $missing_location,
    $illnesses,
    $chemical_dependency,
    $profile,
    $car_plate
  );

  $preparement_query_to_create_missing->execute();
  $preparement_query_to_create_missing->close();
}

function fetch_missings_by_user_id($connection, int $user_id, int $skip)
{
  $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;

  $preparement_query_to_fetch_missings = $connection->prepare("SELECT * FROM MissingPerson WHERE user_id = ? ORDER BY created_at DESC LIMIT ? OFFSET ?");
  $preparement_query_to_fetch_missings->bind_param("sss", $user_id, $quantity_missings, $offset_missings);
  $preparement_query_to_fetch_missings->execute();
  $result = $preparement_query_to_fetch_missings->get_result();
  return $result;
}

function fetch_recent_missings($connection, int $skip)
{
  $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;
  $query = "SELECT * FROM MissingPerson ORDER BY created_at DESC LIMIT {$quantity_missings} OFFSET {$offset_missings}";

  $result = $connection->query($query);
  return $result;
}

function fetch_missings($connection, int $skip)
{
  $quantity_missings = 10;
  $offset_missings = $skip * $quantity_missings;
  $query = "SELECT * FROM MissingPerson ORDER BY created_at DESC LIMIT {$quantity_missings} OFFSET {$offset_missings}";

  $result = $connection->query($query);
  return $result;
}

function delete_missing_by_user_id($connection, int $user_id, int $missing_id)
{
  $preparement_query_to_delete_missing = $connection->prepare("DELETE FROM MissingPerson WHERE missing_person_id = ? AND user_id = ?");
  $preparement_query_to_delete_missing->bind_param("ss", $missing_id, $user_id);
  $preparement_query_to_delete_missing->execute();
  $preparement_query_to_delete_missing->close();
}

function get_quantity_pages_by_user_id($connection, $user_id)
{
  $sql = "SELECT COUNT(*) AS quantity_missings FROM MissingPerson WHERE user_id = '{$user_id}'";
  $result = $connection->query($sql);

  $row = $result->fetch_assoc();
  $quantity_missings = $row['quantity_missings'];
  $quantity_missing_per_page = 10;
  $quantity_pages = ceil($quantity_missings / $quantity_missing_per_page);

  // Must have at least one page
  if ($quantity_pages == 0) {
    return 1;
  }

  return $quantity_pages;
}

function calculate_quantity_pages($per_page, $total)
{
  $quantity_pages = ceil($total / $per_page);
  return $quantity_pages;
}

function update_missing_by_user_id(
  $connection,
  $user_id,
  $missing_id,
  $missing_person_name,
  $missing_person_gender,
  $missing_person_photo,
  $missing_person_contact,
  $missing_person_story,
  $missing_person_note,
  $missing_date,
  $missing_person_age,
  $missing_location,
  $illnesses,
  $chemical_dependency,
  $profile,
  $car_plate
) {

  $preparement_query_to_update_missing = $connection->prepare("UPDATE MissingPerson SET missing_person_name = ?, missing_person_gender = ?, missing_person_photo = ?, missing_person_contact = ?, missing_person_story = ?, missing_person_note = ?, missing_date = ?, missing_person_age = ?, missing_location = ?, illnesses = ?, chemical_dependency = ?, profile = ?, car_plate = ? WHERE missing_person_id = ? AND user_id = ?");
  $preparement_query_to_update_missing->bind_param(
    "sssssssssssssss",
    $missing_person_name,
    $missing_person_gender,
    $missing_person_photo,
    $missing_person_contact,
    $missing_person_story,
    $missing_person_note,
    $missing_date,
    $missing_person_age,
    $missing_location,
    $illnesses,
    $chemical_dependency,
    $profile,
    $car_plate,
    $missing_id,
    $user_id
  );

  $preparement_query_to_update_missing->execute();
  $preparement_query_to_update_missing->close();
}

function get_missing_by_id($connection, $missing_id)
{
  $preparement_query_to_select_missing = $connection->prepare("SELECT * FROM MissingPerson WHERE missing_person_id = ?");
  $preparement_query_to_select_missing->bind_param("s", $missing_id);
  $preparement_query_to_select_missing->execute();
  return $preparement_query_to_select_missing->get_result()->fetch_assoc();
}

function delete_all_missings($connection)
{
  $preparement_query_to_delete_all_missing = $connection->prepare("DELETE FROM MissingPerson");
  $preparement_query_to_delete_all_missing->execute();
  $preparement_query_to_delete_all_missing->close();
}
