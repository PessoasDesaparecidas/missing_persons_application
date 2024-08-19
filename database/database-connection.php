<?php
$username = "root";
$password = "usbw";
$database = "tcc";
$host = "localhost";
$connection = new mysqli($host, $username, $password, $database);

if ($connection->error) {
    die("falha ao conectar o banco de dados" . $connection->error);
}


$create_user_table = "CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario INT AUTO_INCREMENT,
    nome_usuario VARCHAR(50) NOT NULL,
    email_usuario VARCHAR(50) NOT NULL UNIQUE,
    senha_usuario VARCHAR(100) NOT NULL,
    esta_banido BOOLEAN  DEFAULT false,
   PRIMARY KEY (id_usuario)
);";

$create_missing_persons_table = "CREATE TABLE IF NOT EXISTS Desaparecido (
   id_desaparecido INT  AUTO_INCREMENT ,
   id_usuario INT,
   nome_desaparecido VARCHAR(50) NOT NULL,
   genero_desaparecido VARCHAR(20) NOT NULL,
   foto_desaparecido VARCHAR(255) NOT NULL,
   contato_desaparecido VARCHAR(255) NOT NULL,
   observacao_desaparecido TEXT NOT NULL,
   idade_desparecido INT NOT NULL,
   data_desaparecimento DATETIME NOT NULL,
   local_desaparecimento VARCHAR(255) NOT NULL,
   created_at datetime DEFAULT CURRENT_TIMESTAMP,
   updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(id_desaparecido),
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);";


$connection->query($create_database);
$connection->query($create_user_table);
$connection->query($create_missing_persons_table);
