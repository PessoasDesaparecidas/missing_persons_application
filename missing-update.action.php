<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";
include "./utils/get-missing-id.php";

if (!get_missing_id()) {
  sonner("error", "Desaparecido não encontrado");
  header("Location: index.php");
}


$missing = get_missing_by_id($connection, get_missing_id());

if (!$missing) {
  sonner("error", "Desaparecido não encontrado");
  header("Location: index.php");
}

$extensao = strtolower(substr($_FILES['imagem']['name'], -4));

$missing_person_photo = $missing["missing_person_photo"];


if ($extensao) {
  $missing_person_photo = md5(time()) . $extensao;
  $diretorio = "./assets/uploads/missings/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $missing_person_photo);
  unlink($diretorio . $missing["missing_person_photo"]);
}


$extension_missing_police_report = strtolower(substr($_FILES['imagem']['name'], -4));

$missing_police_report = $missing["missing_police_report"];


if ($extension_missing_police_report) {
  $missing_police_report = md5(time()) . $extension_missing_police_report;
  $path_missing_police_report = "./assets/storage/";
  move_uploaded_file($_FILES["police_report"]["tmp_name"], $path_missing_police_report . $missing_police_report);
  unlink($path_missing_police_report . $missing["missing_police_report"]);
}



$missing_person_name = filter_var($_POST['missing_person_name'], FILTER_SANITIZE_SPECIAL_CHARS);
$missing_person_contact = filter_var($_POST['missing_person_contact'], FILTER_SANITIZE_SPECIAL_CHARS);
$missing_person_story = filter_var($_POST['missing_person_story'], FILTER_SANITIZE_SPECIAL_CHARS);
$missing_person_note = filter_var($_POST['missing_person_note'], FILTER_SANITIZE_SPECIAL_CHARS);
$missing_date = trim($_POST['missing_date']);
$missing_person_age = trim($_POST['missing_person_age']);
$missing_location = filter_var($_POST['missing_location'], FILTER_SANITIZE_SPECIAL_CHARS);

$missing_person_gender = filter_var($_POST['missing_person_gender'], FILTER_SANITIZE_SPECIAL_CHARS);

$illnesses = filter_var($_POST['mais-infromacao-1'], FILTER_SANITIZE_SPECIAL_CHARS);;
$chemical_dependency = filter_var($_POST['mais-infromacao-2'], FILTER_SANITIZE_SPECIAL_CHARS);;
$profile = filter_var($_POST['mais-infromacao-3'], FILTER_SANITIZE_SPECIAL_CHARS);;
$car_plate = filter_var($_POST['mais-infromacao-4'], FILTER_SANITIZE_SPECIAL_CHARS);;


update_missing_by_user_id(
  $connection,
  get_user_id(),
  get_missing_id(),
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
);

sonner("success", "sucesso em atualizar desaparecido");

header('Location: perfil.php#missings');
