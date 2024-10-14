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
   doencas VARCHAR(255),
   dependente_quimico VARCHAR(255),
   perfil VARCHAR(255),
   placa_do_carro VARCHAR(9),
   created_at datetime DEFAULT CURRENT_TIMESTAMP,
   updated_at datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(id_desaparecido),
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
)";

$create_missing_comments_table = "CREATE TABLE IF NOT EXISTS Comentario(
   id_comentario INT AUTO_INCREMENT,
   id_desaparecido INT NOT NULL,
   id_usuario INT NOT NULL,
   conteudo TEXT NOT NULL,
   created_at datetime DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id_comentario),
   foreign key (id_desaparecido) REFERENCES Desaparecido(id_desaparecido) ON DELETE CASCADE ON UPDATE CASCADE,
   foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE)";

$connection->query($create_user_table);
$connection->query($create_missing_persons_table);
$connection->query($create_missing_comments_table);
