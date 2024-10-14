<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";
include "./utils/get-missing-id.php";

if(!get_missing_id()){
  sonner("error", "Desaparecido não encontrado");
  header("Location: index.php");
}

$page = $_GET["page"];

$missing = get_missing_by_id($connection, get_missing_id());

if (!$missing) {
  sonner("alert", "Desaparecido não encontrado");
  header('Location: missings-dashboard.php?page=1');
}

delete_missing_by_user_id($connection, get_user_id(), get_missing_id());

sonner("success", "sucesso em deletar desaparecido");
header('Location: missings-dashboard.php?page=' . $page);