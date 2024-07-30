<?php
session_start();
$_SESSION['id_user'] = '';
$_SESSION['message'] = 'saída efetuada com sucesso';
header('Location: index.php');
