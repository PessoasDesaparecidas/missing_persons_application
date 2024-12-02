<?php
include './utils/protect-page-route.php';
include "./utils/sonner.php";
include "./database/database-connection.php";
include "./database/missings-repository.php";


if (isset($_POST['btn-cadastre-missing'])) {
  // Sanitização dos dados
  $missing_person_name = filter_var($_POST['missing_person_name'], FILTER_SANITIZE_SPECIAL_CHARS);
  $missing_person_contact = filter_var($_POST['missing_person_contact'], FILTER_SANITIZE_SPECIAL_CHARS);
  $missing_person_story = filter_var($_POST['missing_person_story'], FILTER_SANITIZE_SPECIAL_CHARS);
  $missing_person_note = filter_var($_POST['missing_person_note'], FILTER_SANITIZE_SPECIAL_CHARS);
  $missing_date = trim($_POST['missing_date']);
  $missing_person_age = trim($_POST['missing_person_age']);
  $missing_location = filter_var($_POST['missing_location'], FILTER_SANITIZE_SPECIAL_CHARS);

  // Outras informações
  $missing_person_gender = filter_var($_POST['missing_person_gender'], FILTER_SANITIZE_SPECIAL_CHARS);

  $illnesses = "";
  if (isset($_POST['mais-infromacao-1'])) {
    $illnesses = filter_var($_POST['mais-infromacao-1'], FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $chemical_dependency = "";
  if (isset($_POST['mais-infromacao-2'])) {
    $chemical_dependency = filter_var($_POST['mais-infromacao-2'], FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $profile = "";
  if (isset($_POST['mais-infromacao-3'])) {
    $profile = filter_var($_POST['mais-infromacao-3'], FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $car_plate = "";
  if (isset($_POST['mais-infromacao-4'])) {
    $car_plate = filter_var($_POST['mais-infromacao-4'], FILTER_SANITIZE_SPECIAL_CHARS);
  }

  // Processamento da imagem
  if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
    $extension_file_photo = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $allowed_extensions_photo = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (in_array($extension_file_photo, $allowed_extensions_photo)) {
      $missing_person_photo = md5(time()) . '.' . $extension_file_photo;
      $path_missing_person_photo = "./assets/uploads/missings/";
      move_uploaded_file($_FILES["imagem"]["tmp_name"], $path_missing_person_photo . $missing_person_photo);
    } else {
      sonner('error', 'Formato de imagem inválido');
    }
  } else {
    sonner('error', 'Erro ao fazer upload da imagem');
  }

  // Processamento do boletim de ocorrência
  if (isset($_FILES['police_report']) && $_FILES['police_report']['error'] == UPLOAD_ERR_OK) {
    $extension_file_report = strtolower(pathinfo($_FILES['police_report']['name'], PATHINFO_EXTENSION));

    if ($extension_file_report === 'pdf') {
      $missing_police_report = md5(time() . 'report') . '.pdf';
      $path_missing_police_report = "./assets/storage/pdfs/";
      move_uploaded_file($_FILES["police_report"]["tmp_name"], $path_missing_police_report . $missing_police_report);
    } else {
      sonner("error", "Formato de boletim de ocorrência inválido.");
    }
  } else {
    sonner("error", "Erro ao fazer upload do boletim de ocorrência.");
  }

  create_missing(
    $connection,
    get_user_id(),
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

  // Redirecionamento e feedback
  sonner('success', 'Desaparecido cadastrado com sucesso');
  header('Location: ./index.php');
} else {
  sonner('error', 'Usuário não autorizado');
  header('Location: ./index.php');
}
