<?php
session_start();
include './database/database-connection.php';


$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

//todo: verifica se a senha hashed do banco de dados está batendo com a senha enviada
$query = "SELECT id_usuario, email_usuario, senha_usuario, nome_usuario FROM Usuario WHERE email_usuario = '{$email}' ";

$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);
$user = $result->fetch_assoc();
$is_password_valid = password_verify($password, $user['senha_usuario']);
if ($row == 1 && $is_password_valid) {
    $_SESSION['user_id'] = $user['id_usuario'];
    $_SESSION['sonner-type'] = 'success';
    $_SESSION['sonner-message'] = ' Bem Vindo ' . $user['nome_usuario'];
} else {
    $_SESSION['user_id'] = '';
    $_SESSION['sonner-type'] = 'error';
    $_SESSION['sonner-message'] = 'credencias envalidas';
}
header('Location: index.php');
