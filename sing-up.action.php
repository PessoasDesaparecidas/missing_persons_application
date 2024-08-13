<?php
session_start();
include './database/database-connection.php';
include './database/user-repository.php';
include './utils/sonner.php';
if (isset($_POST['submit-form-register'])) {

  $name = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

  $isValidatedTheDataUser = !empty($email) || !empty($name) || !empty($password);

  if ($isValidatedTheDataUser) {

    $valid_user_email = ! find_by_email($connection, $email);
    if ($valid_user_email) {
      $password_hashed = password_hash($password, PASSWORD_BCRYPT);
      create_user($connection, $name, $email, $password_hashed);
      $user = find_by_email($connection, $email);
      $_SESSION['user_id'] = $user['id_usuario'];
      sonner('success', ' Bem Vindo ' . $user);
    } else {
      $_SESSION['user_id'] = '';
      sonner('alert', 'usuario com email existente');
    }
  } else {
    sonner('error', 'usuario não autorizado');
  }
  header('Location: index.php');
}
