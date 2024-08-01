<?php
session_start();
$_SESSION['user_id'] = '';
$_SESSION['message'] = 'saída efetuada com sucesso';
header('Location: index.php');
