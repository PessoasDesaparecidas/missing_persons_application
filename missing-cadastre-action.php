<?php
session_start();
include './database/database-connection.php';
$usuario_id = $_SESSION['id_user'] ?? '';

if (!$usuario_id) {
  header('Location: index.php');
}

if (isset($_POST['btn-cdastre-missing'])) {

  $nome_desaparecido = trim($_POST['nome_desaparecido']);
  $contato_desaparecido = trim($_POST['contato_desaparecido']);
  $observacao_desaparecido = trim($_POST['observacao_desaparecido']);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $data_nascimento = trim($_POST['data_nascimento']);
  $local_desaparecimento = trim($_POST['local_desaparecimento']);

  $extensao = strtolower(substr($_FILE['imagem']['name'], -4));
  $foto_desaparecido = md5(time()) . $extensao;
  $diretorio = "./assets/uploads/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $foto_desaparecido);



  $query = "INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,data_nascimento, local_desaparecimento)
VALUES
    ('$usuario_id', '$nome_desaparecido', '$foto_desaparecido', '$contato_desaparecido', '$observacao_desaparecido','$data_desaparecimento', '$data_nascimento', '$local_desaparecimento')";
  echo "<pre>" . $query . "</pre>";
  $result = $connection->query($query);
  if ($result == 1) {
    header('Location: missings-dashboard.php');
  } else {
    // TODO:error message
    header('Location: index.php');
  }
} else {
  header('Location: index.php');
}
