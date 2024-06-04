<?php
session_start();
if (isset($_POST['btn-cdastre-missing'])) {
  $nome_desaparecido = trim($_POST['nome_desaparecido']);
  $contato_desaparecido = trim($_POST['contato_desaparecido']);
  $observacao_desaparecido = trim($_POST['observacao_desaparecido']);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $data_nascimento = trim($_POST['data_nascimento']);
  $local_desaparecimento = trim($_POST['local_desaparecimento']);

  //Salvando a imagem 
  $extensao = strtolower(substr($_FILE['imagem']['name'], -4));
  $foto_desaparecido = md5(time()) . $extensao;
  $diretorio = "./assets/uploads/";
  move_uploaded_file($_FILES["imagem"]["tmp_name"], $diretorio . $foto_desaparecido);



  echo "<pre>";
  $query = "INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,data_nascimento, local_desaparecimento)
VALUES
    (, '$nome_desaparecido', '$foto_desaparecido', '$contato_desaparecido', '$observacao_desaparecido','$data_desaparecimento', '$data_nascimento', '$local_desaparecimento')";
}
echo "</pre>";

/*
print_r($query);



  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";

  echo " nome_desaparecido <br>";
  print_r($nome_desaparecido);
  echo "<br>";

  echo " contato_desaparecido <br>";
  print_r($contato_desaparecido);
  echo "<br>";

  echo " observacao_desaparecido <br>";
  print_r($observacao_desaparecido);
  echo "<br>";

  echo " data_desaparecimento <br>";
  print_r($data_desaparecimento);
  echo "<br>";

  echo " data_nascimento <br>";
  print_r($data_nascimento);
  echo "<br>";

  echo " local_desaparecimento <br>";
  print_r($local_desaparecimento);
  echo "<br>";


  echo "novo nome:";
  print_r($foto_desaparecido);
  echo "<br>";
   */