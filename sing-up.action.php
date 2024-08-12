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
    $select_user_by_email_query = mysqli_query($connection, $query);
    $valid_user_email = !(mysqli_num_rows($select_user_by_email_query));

    if ($valid_user_email) {
      $password_hashed = password_hash($password, PASSWORD_BCRYPT);
      $create_user_query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$name}', '{$email}', '{$password_hashed}', False)";

      $result_query = mysqli_query($connection, $create_user_query);

      //TODO: redirecionar para sing-in
      if ($result_query) {
        $select_new_user_created_query = "SELECT id_usuario, email_usuario, nome_usuario FROM Usuario WHERE email_usuario = '{$email}'";
        $result = $connection->query($select_new_user_created_query);

        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['sonner-type'] = 'success';
        $_SESSION['sonner-message'] = ' Bem Vindo ' . $user['nome_usuario'];
      }
    } else {
      // tratativa de usuario já existent com mesmo email
      $_SESSION['user_id'] = '';
      $_SESSION['sonner-type'] = 'alert';
      $_SESSION['sonner-message'] = 'usuario com email existente';
    }
  } else {
    // tratativa de não autorizados
    $_SESSION['sonner-type'] = 'error';
    $_SESSION['sonner-message'] = 'usuario não autorizado';
  }
}

header("location: index.php");
