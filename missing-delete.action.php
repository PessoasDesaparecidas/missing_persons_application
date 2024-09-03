<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";

$missing_id = $_GET['missing_id'];

$missing = get_missing_by_id($connection, $missing_id);

if (!$missing) {
  sonner("alert", "Desaparecido não encontrado");
  header('Location: missings-dashboard.php');
}

delete_missing_by_user_id($connection, get_user_id(), $missing_id);

sonner("success", "sucesso em deletar desaparecido");
header('Location: missings-dashboard.php');