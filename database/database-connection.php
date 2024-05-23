<?php
$username = "root";
$password = "1234";
$database = "tcc";
$host = "localhost:3312";
$connection = new mysqli($host, $username, $password, $database);

if ($connection->error) {
    die("falha ao conectar o banco de dados" . $connection->error);
}

$create_user_table = "CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario INT AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL,
    email_usuario VARCHAR(50) NOT NULL UNIQUE,
    senha_usuario VARCHAR(20) NOT NULL,
    esta_banido BOOLEAN  DEFAULT True,
   PRIMARY KEY (id_usuario)
);";

$create_missing_persons_table = "CREATE TABLE IF NOT EXISTS Desaparecido (
   id_desaparecido INT  AUTO_INCREMENT ,
   id_usuario INT,
   nome_desaparecido varchar(50) NOT NULL,
   foto_desaparecido VARCHAR(255) NOT NULL,
   contato_desaparecido INT NOT NULL,
   observacao_desaparecido TEXT NOT NULL,
   data_nascimento DATE NOT NULL,
   data_desaparecimento DATE NOT NULL,
   local_desaparecimento VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_desaparecido),
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);";


$connection->query($create_user_table);
$connection->query($create_missing_persons_table);
