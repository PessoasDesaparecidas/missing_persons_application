<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";
include "./utils/get-missing-id.php";
include "./database/comments-repository.php";

if (!get_missing_id()) {
  sonner("error", "Desaparecido não encontrado");
  header("Location: index.php");
}


$missing = get_missing_by_id($connection, get_missing_id());

if (!$missing) {
  sonner("error", "Desaparecido não encontrado");

  if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

    if ($previousPage) {
      header("Location: $previousPage");
      exit;
    }
  }
}

$path_missing_police_report = "./assets/storage/pdfs/" . $missing["missing_police_report"];
$path_missing_photo = "./assets/uploads/missings/" . $missing["missing_person_photo"];

unlink($path_missing_police_report);
unlink($path_missing_photo);

$comments = fetch_comments_by_missing_id($connection, get_missing_id());

while ($comment = $comments->fetch_assoc()) {
  $path_comment_image = "./assets/uploads/comments/" . $comment["image_url"];
  unlink($path_comment_image);
}

delete_all_comment_by_missing_id($connection, get_missing_id());
delete_missing_by_user_id($connection, get_user_id(), get_missing_id());

sonner("success", "sucesso em deletar desaparecido");

if (isset($_SERVER['HTTP_REFERER'])) {
  $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

  if ($previousPage) {
    header("Location: $previousPage");
    exit;
  }
}
