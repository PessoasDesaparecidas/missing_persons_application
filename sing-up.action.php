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
      //tratativa para usuario criado

      // TODO: verifica se a senha hashed bate com senha normal
      //$password_hashed = password_hash($password,PASSWORD_BCRYPT);
      $create_user_query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$name}', '{$email}', '{$password}', False)";
      $result_query = mysqli_query($connection, $create_user_query);

      if ($result_query) {
        $select_new_user_created_query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}'";
        $result = $connection->query($select_new_user_created_query);

        $user = $result->fetch_assoc();

        $_SESSION['user_id'] = $user['id_usuario'];
        $_SESSION['sonner-type'] = 'success';
        $_SESSION['sonner-message'] = 'login efetuado com sucesso';
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
