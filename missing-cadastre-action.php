<?php
session_start();

$usuario_id = $_SESSION['id_user'] ?? '';

echo "id usuario = " + $usuario_id;

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



  echo "
<pre>";
  $query = "INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,data_nascimento, local_desaparecimento)
VALUES
    (, '$nome_desaparecido', '$foto_desaparecido', '$contato_desaparecido', '$observacao_desaparecido','$data_desaparecimento', '$data_nascimento', '$local_desaparecimento')";
}
print_r($query);
echo "</pre>";
