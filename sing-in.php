<?php
session_start();
$_SESSION['errors'] = '';
include './database/database-connection.php';

if (empty($_POST['email']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($connection, $_POST['email']);
$senha = mysqli_real_escape_string($connection, $_POST['senha']);

$query = "SELECT id_usuario, email_usuario FROM Usuario WHERE email_usuario = '{$email}' AND senha_usuario = '{$senha}'";

$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);
if ($row == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['id_usuario'] = $user['id_usuario'];
    header('Location: index.php');
    exit();
} else {
    $_SESSION['errors'] = 'Usuario invalido';
    header('Location: index.php');
    exit();
}
?>