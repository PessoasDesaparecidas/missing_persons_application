<?php
if (isset($_POST['btn-cdastre-missing'])) {
  $nome_desaparecido = trim($_POST['nome_desaparecido']);
  $contato_desaparecido = trim($_POST['contato_desaparecido']);
  $observacao_desaparecido = trim($_POST['observacao_desaparecido']);
  $data_desaparecimento = trim($_POST['data_desaparecimento']);
  $data_nascimento = trim($_POST['data_nascimento']);
  $local_desaparecimento = trim($_POST['local_desaparecimento']);



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
}
