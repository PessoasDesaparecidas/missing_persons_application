<?php
session_start();
$_SESSION['user_id'] = '';
$_SESSION['sonner-type'] = 'success';
$_SESSION['sonner-message'] = 'logout feito com sucesso';
header('Location: index.php');