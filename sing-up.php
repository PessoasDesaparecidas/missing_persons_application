<?php
session_start();


include './database/database-connection.php';

$email = mysqli_real_escape_string($connection, trim($_POST['email']));
$usuario = mysqli_real_escape_string($connection, trim($_POST['nome']));
$senha = mysqli_real_escape_string($connection, trim($_POST['senha']));

$sql = "select count(*) as total from Usuario where nome_usuario = '$usuario'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: index.php');
    exit;
}

$sql = "INSERT INTO Usuario (email_usuario, nome_usuario, senha_usuario) VALUES ('$email', '$usuario', '$senha')";

if ($connection->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}
$connection->close();
header('Location: #register');
exit;