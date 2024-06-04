<?php
session_start();
include './database/database-connection.php';
if (isset($_POST['submit-form-register'])) {
  $name = $_POST['nome'];
  $email = $_POST['email'];
  $password = $_POST['senha'];

  if (!empty($email) || !empty($name) || !empty($password)) {

    $query = "SELECT * FROM Usuario WHERE email_usuario = '{$email}'";
    $result = mysqli_query($connection, $query);
    $existing_user = mysqli_num_rows($result);

    if (!$existing_user) {
      $query = "INSERT INTO Usuario (nome_usuario, email_usuario , senha_usuario, esta_banido)
        VALUES('{$name}', '{$email}', '{$password}', False)";

      $result = mysqli_query($connection, $query);

      if ($result) {
        echo "<script>
            alert('user cadastrado')
          </script>";
      }
    }
  }
}
header('Location: index.php');
