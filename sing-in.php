<?php
session_start();
include './database/database-connection.php';
if (isset($_POST['btn-login'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $senha = mysqli_real_escape_string($connection, $_POST['senha']);

    $query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}' AND senha_usuario = '{$senha}'";

    $result = mysqli_query($connection, $query);

    $row = mysqli_num_rows($result);
    if ($row == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id_user'] = $user['id_usuario'];
        $_SESSION['errors'] = '';
        $_SESSION['message'] = 'login efetuado com sucesso';


        header("location: index.php");
    } else {
        $_SESSION['id_user'] = '';
        $_SESSION['errors'] = 'Usuario invalido';
        $_SESSION['message'] = 'usuario não econtrado';
    }
}
