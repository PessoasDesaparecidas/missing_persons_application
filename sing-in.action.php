<?php
session_start();
include './database/database-connection.php';
if (isset($_POST['btn-login'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

    $query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}' AND senha_usuario = '{$password}'";

    $result = mysqli_query($connection, $query);

    $row = mysqli_num_rows($result);
    if ($row == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id_user'] = $user['id_usuario'];
        $_SESSION['errors'] = '';
        $_SESSION['message'] = 'login efetuado com sucesso';
    } else {
        $_SESSION['id_user'] = '';
        $_SESSION['errors'] = 'Usuario invalido';
        $_SESSION['message'] = 'usuario não econtrado';
    }

    header("location: index.php");
}
