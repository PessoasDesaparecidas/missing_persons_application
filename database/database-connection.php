<?php
$host = "localhost:3306";
$username = "root";
$password = "";
$database = "tcc";

$connection = new mysqli($host, $username, $password, $database);

if ($connection->error) {
    print_r($connection->error);
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

$create_missing_persons_table = "CREATE TABLE IF NOT EXISTS Desaparecido(
   id_desaparecido INT  AUTO_INCREMENT,
   id_usuario INT NOT NULL,
   nome_desaparecido VARCHAR(50) NOT NULL,
   genero_desaparecido VARCHAR(20) NOT NULL,
   foto_desaparecido VARCHAR(255) NOT NULL,
   contato_desaparecido VARCHAR(255) NOT NULL,
   historia_desaparecido TEXT NOT NULL,
   observacao_desaparecido TEXT NOT NULL,
   idade_desparecido INT NOT NULL,
   data_desaparecimento DATETIME NOT NULL,
   local_desaparecimento VARCHAR(255) NOT NULL,
   created_at datetime DEFAULT CURRENT_TIMESTAMP,
   updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(id_desaparecido),
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
)";

$create_missing_comments_table = "CREATE TABLE IF NOT EXISTS Comentario(
   id_desaparecido INT ,
   id_usuario INT ,
   conteudo TEXT NOT NULL,
   created_at datetime DEFAULT CURRENT_TIMESTAMP,
   foreign key (id_desaparecido) REFERENCES Desaparecido(id_desaparecido) ON DELETE CASCADE ON UPDATE CASCADE,
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE)";

$create_missing_plus_information_table = "CREATE TABLE IF NOT EXISTS MaisInformacao(
    id_mais_informacao INT AUTO_INCREMENT PRIMARY KEY,
    id_desaparecido INT,
    doencas VARCHAR(50),
    perfil VARCHAR(50),
    ja_abriu_bo BOOLEAN,
    placa_do_carro VARCHAR(9),
    depende_quimico VARCHAR(255),
     foreign key (id_desaparecido) REFERENCES Desaparecido(id_desaparecido) ON DELETE CASCADE ON UPDATE CASCADE)";



$connection->query($create_user_table);
$connection->query($create_missing_persons_table);
$connection->query($create_missing_plus_information_table);
$connection->query($create_missing_comments_table);
