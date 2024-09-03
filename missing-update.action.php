<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";


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

  echo $missing_id;
  echo $nome_desaparecido;
  echo $genero_desaparecido;
  echo $foto_desaparecido;
  echo $contato_desaparecido;
  echo $historia_desaparecido;
  echo $observacao_desaparecido;
  echo $data_desaparecimento;
  echo $idade_desparecido;
  echo $local_desaparecimento;

  update_missing_by_user_id(
    $connection,
    $user_id,
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
}