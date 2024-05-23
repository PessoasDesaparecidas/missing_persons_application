<?php
session_start();
include './database/database-connection.php';


if(empty($_POST['email']) || empty($_POST['senha'])){
    header('Location: index.php');
    exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id_usuario, email_usuario from Usuario where email = '{$email}' and senha_usuario =  ('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['email'] = $email;
    header('Location: index.php');
    exit();
}
else{
    header('Location: index.php');
    exit();
}
?>