<?php
session_start();
$_SESSION['id_user'] = '';
header('Location: index.php');
$_SESSION['message'] = 'saída efetuada com sucesso';

?>