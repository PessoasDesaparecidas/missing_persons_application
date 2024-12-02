<?php
include "./utils/protect-page-route.php";
include "./utils/sonner.php";

$user = find_by_id($connection, get_user_id());

$name = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

$user_photo = $user['user_photo'];

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $extension_photo = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION));
    $user_photo = md5(time()) . '.' . $extension_photo;
    $path_to_images_for_user = "./assets/uploads/users/";

    move_uploaded_file($_FILES["imagem"]["tmp_name"], $path_to_images_for_user . $user_photo);

    if (!empty($user["user_photo"]) && file_exists($path_to_images_for_user . $user["user_photo"])) {
        unlink($path_to_images_for_user . $user["user_photo"]);
    }
}

update_user_by_id($connection, get_user_id(), $name,  $password, $user_photo);

if (isset($_SERVER['HTTP_REFERER'])) {
    $previousPage = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);

    if ($previousPage) {
        sonner("success", "Perfil atualizado com sucesso!");
        header("Location: $previousPage");
        exit;
    }
}

header("Location: ./perfil.php");
