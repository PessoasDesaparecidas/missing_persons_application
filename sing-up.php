<?php
session_start();
include './database/database-connection.php';
if (isset($_POST['submit-form-register'])) {

  $name = filter_var($_POST['nome'], FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $password = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

  $isValidatedTheDataUser = !empty($email) || !empty($name) || !empty($password);

  if ($isValidatedTheDataUser) {

    $query = "SELECT * FROM Usuario WHERE email_usuario = '{$email}'";
    $result_query = mysqli_query($connection, $query);
    $isAnExistingUser = mysqli_num_rows($result_query);

    if (!$isAnExistingUser) {
      $query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$name}', '{$email}', '{$password}', False)";
      $result_query = mysqli_query($connection, $query);

      if ($result_query) {
        $query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}' AND senha_usuario = '{$password}'";
        $result = $connection->query($query);
        $user = $result->fetch_assoc();

        $_SESSION['id_user'] = $user['id_usuario'];
        $_SESSION['errors'] = '';
        $_SESSION['message'] = 'login efetuado com sucesso';
      }
    } else {
      //TODO: tratativa de usuario já existent com mesmo email
      $_SESSION['id_user'] = '';
      $_SESSION['errors'] = 'usuario com email existente';
      $_SESSION['message'] = '';
    }
  } else {
    //TODO: tratativa de unauthorised
    $_SESSION['errors'] = 'credenciais invalidas';
    $_SESSION['id_user'] = '';
    $_SESSION['message'] = '';
  }
}

header("location: index.php");
