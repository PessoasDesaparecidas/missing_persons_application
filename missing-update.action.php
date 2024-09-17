<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";

if (isset($_POST["btn-update-missing"])) {
  $missing_id = $_GET["missing_id"];

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


  update_missing_by_user_id(
    $connection,
    get_user_id(),
    $missing_id,
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

  sonner("success", "sucesso em atualizar desaparecido");
  header('Location: missings-dashboard.php?page=1');
}