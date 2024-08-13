<?php
include "./utils/is-authenticate-user.php";
include "./utils/sonner.php";
include "./database/database-connection.php";
session_start();

if (isset($_POST['btn-cdastre-missing']) && is_authenticate_user($connection, $_SESSION['user_id'])) {

  $nome_desaparecido = filter_var($_POST['nome_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $contato_desaparecido = filter_var($_POST['contato_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $observacao_desaparecido = filter_var($_POST['observacao_desaparecido'], FILTER_SANITIZE_SPECIAL_CHARS);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $data_nascimento = trim($_POST['data_nascimento']);
  $local_desaparecimento = filter_var($_POST['local_desaparecimento'], FILTER_SANITIZE_SPECIAL_CHARS);

  $extensao = strtolower(substr($_FILE['imagem']['name'], -4));
  $foto_desaparecido = md5(time()) . $extensao;
  $diretorio = "./assets/uploads/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $foto_desaparecido);



  $preparement_query_to_created_missing = $connection->prepare("INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,data_nascimento, local_desaparecimento)
VALUES (?, ?, ?, ?, ?,?, ?, ?)");

  $preparement_query_to_created_missing->bind_param(
    "ssssssss",
    $usuario_id,
    $nome_desaparecido,
    $foto_desaparecido,
    $contato_desaparecido,
    $observacao_desaparecido,
    $data_desaparecimento,
    $data_nascimento,
    $local_desaparecimento
  );

  $preparement_query_to_created_missing->execute();

  $preparement_query_to_created_missing->close();

  sonner('success', 'desaparecido cadastrado com sucesso');
} else {
  sonner('error', 'usuario não autorizado');
}
