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

create_comment($connection, get_missing_id(), get_user_id(), $comment);
sonner("success", "Comentário criado com sucesso");
header("Location: missing.php?missing_id=$missing_id");
