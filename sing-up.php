<?php
session_start();
include './database/database-connection.php';
if (isset($_POST['submit-form-register'])) {

  $name = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

  $isValidatedTheData = !empty($email) || !empty($name) || !empty($password);
  if ($isValidatedTheData) {
    $query = "SELECT * FROM Usuario WHERE email_usuario = '{$email}'";
    $result_query = mysqli_query($connection, $query);
    $isAnExistingUser = mysqli_num_rows($result_query);

    if (!$isAnExistingUser) {
      $query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$name}', '{$email}', '{$password}', False)";

      $result_query = mysqli_query($connection, $query);

      if ($result_query) {
        //TODO: se der tudo certo
      }
    } else {
      //TODO: tratativa de usuario já existent com mesmo email
    }
  } else {
    //TODO: tratativa de unauthorised
  }
}
header('Location: index.php');
