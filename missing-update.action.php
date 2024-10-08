<?php
include "./utils/protect-page-route.php";
include "./database/missings-repository.php";
include "./utils/sonner.php";

$page = $_GET["page"];
if (isset($_POST["btn-update-missing"])) {
  $missing_id = $_GET["missing_id"];

  $missing = get_missing_by_id($connection,$missing_id);

  $extensao = strtolower(substr($_FILES['imagem']['name'], -4));

  $foto_desaparecido = $missing["foto_desaparecido"];
 

  if($extensao){
    $foto_desaparecido = md5(time()) . $extensao;
    $diretorio = "./assets/uploads/";
    move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $foto_desaparecido);  
    unlink($diretorio.$missing["foto_desaparecido"]);
  }

  $nome_desaparecido = filter_var($_POST['nome_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $contato_desaparecido = filter_var($_POST['contato_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $historia_desaparecido = filter_var($_POST['historia_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $observacao_desaparecido = filter_var($_POST['observacao_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $idade_desparecido = trim($_POST['idade_desparecido']);
  $local_desaparecimento = filter_var($_POST['local_desaparecimento'], FILTER_SANITIZE_SPECIAL_CHARS);
  
  $genero_desaparecido = filter_var($_POST['genero_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);

  $doencas = filter_var($_POST['mais-infromacao-1'], FILTER_SANITIZE_SPECIAL_CHARS);;
  $dependente_quimico = filter_var($_POST['mais-infromacao-2'], FILTER_SANITIZE_SPECIAL_CHARS);;
  $perfil = filter_var($_POST['mais-infromacao-3'], FILTER_SANITIZE_SPECIAL_CHARS);;
  $placa_do_carro = filter_var($_POST['mais-infromacao-4'], FILTER_SANITIZE_SPECIAL_CHARS);;


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
    $local_desaparecimento,
    $doencas, 
    $dependente_quimico, 
    $perfil, 
    $placa_do_carro
  );

  sonner("success", "sucesso em atualizar desaparecido");
}
header('Location: missings-dashboard.php?page=' . $page);