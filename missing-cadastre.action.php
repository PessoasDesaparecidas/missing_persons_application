<?php
include "./utils/is-authenticate-user.php";
include "./utils/sonner.php";
session_abort();
include "./database/database-connection.php";
include "./utils/get-user-id.php";
include "./database/missings-repository.php";


$user_id = get_user_id();

if (isset($_POST['btn-cdastre-missing']) && is_authenticate_user($connection, $user_id)) {

  $nome_desaparecido = filter_var($_POST['nome_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $contato_desaparecido = filter_var($_POST['contato_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $historia_desaparecido = filter_var($_POST['historia_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $observacao_desaparecido = filter_var($_POST['observacao_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $idade_desparecido = trim($_POST['idade_desparecido']);
  $local_desaparecimento = filter_var($_POST['local_desaparecimento'], FILTER_SANITIZE_SPECIAL_CHARS);
  $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
  $foto_desaparecido = md5(time()) . $extensao;
  $diretorio = "./assets/uploads/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $foto_desaparecido);
  $genero_desaparecido = filter_var($_POST['genero_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);

  create_missing(
    $connection,
    $user_id,
    $nome_desaparecido,
    $genero_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $historia_desaparecido,
    $observacao_desaparecido,
    $data_desaparecimento,
    $idade_desparecido,
    $local_desaparecimento
  );

  sonner('success', 'desaparecido cadastrado com sucesso');
  header("Location: missings-dashboard.php");
} else {
  sonner('error', 'usuario não autorizado');
  header("Location: index.php");
}
