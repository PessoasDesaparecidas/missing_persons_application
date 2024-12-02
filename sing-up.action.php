<?php
session_start();
include './database/database-connection.php';
include './database/users-repository.php';
include './utils/sonner.php';
if (isset($_POST['submit-form-register'])) {

  $name = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

  $is_validated_the_data_user = !empty($email) && !empty($name) && !empty($password);

  // photo user 
  $extension_photo = strtolower(substr($_FILES['imagem']['name'], -4));
  $user_photo = md5(time()) . $extension_photo;
  $path_to_images_for_user = "./assets/uploads/users/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $path_to_images_for_user . $user_photo);

  if ($is_validated_the_data_user) {

    $valid_user_email = ! find_by_email($connection, $email);

    if ($valid_user_email) {
      $password_hashed = password_hash($password, PASSWORD_BCRYPT);
      create_user($connection, $name, $email, $password_hashed, $user_photo);

      $user = find_by_email($connection, $email);
      $_SESSION['user_id'] = $user['user_id'];
      sonner('success', ' Bem Vindo ' . $user["username"]);
    } else {
      $_SESSION['user_id'] = '';
      sonner('alert', 'usuario com email existente');
    }
  } else {
    sonner('error', 'usuario não autorizado');
  }

  if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

    if ($previousPage) {
      header("Location: $previousPage");
      exit;
    }
  }


  header('Location: index.php');
}
