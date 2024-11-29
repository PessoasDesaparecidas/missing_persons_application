<?php
include "./utils/protect-page-route.php";
include "./database/comments-repository.php";
include "./utils/sonner.php";
include "./utils/get-missing-id.php";

if (!get_missing_id()) {
    sonner("error", "Desaparecido não encontrado");
    header("Location: index.php");
}

$missing_id = get_missing_id();
$comment = filter_var($_POST["comment"], FILTER_SANITIZE_SPECIAL_CHARS);
$latitude = filter_var($_POST["latitude"], FILTER_SANITIZE_SPECIAL_CHARS);
$longitude = filter_var($_POST["longitude"], FILTER_SANITIZE_SPECIAL_CHARS);

echo "" . $missing_id . "" . $comment . "" . $latitude . "" . $longitude . "";


create_comment($connection, get_missing_id(), get_user_id(), $comment, $latitude, $longitude);
sonner("success", "Comentário criado com sucesso");
header("Location: index.php");