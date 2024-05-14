<?php
$hostname = "";
$user = "";
$password = "";
$database = " ";


$connection = new mysqli();
if ($connection->error) {
  die("erro na conexão com banco de dados");
}

echo "conexão feita com sucesso";
