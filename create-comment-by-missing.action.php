<?php 
include "./utils/protect-page-route.php";
include "./database/comments-repository.php";
include "./utils/sonner.php";

if(!isset($_GET["missing_id"])){
    sonner("error", "Desaparecido não encontrado");
    header("Location: index.php");
}

$user_id = get_user_id();
$missing_id = $_GET["missing_id"];
$comment = filter_var($_POST["comment"], FILTER_SANITIZE_SPECIAL_CHARS);

create_comment($connection, $user_id, $missing_id, $comment);
sonner("success", "Comentário criado com sucesso");
header("Location: missing.php?missing_id=$missing_id");

?>