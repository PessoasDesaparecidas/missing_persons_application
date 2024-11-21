<?php
include "./utils/protect-page-route.php";
include "./utils/sonner.php";

delete_user_by_id($connection, get_user_id());


$_SESSION['user_id'] = '';

sonner('success', 'conta deleta com sucesso');
header('Location index.php');