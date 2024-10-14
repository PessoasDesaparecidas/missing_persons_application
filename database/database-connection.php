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

$create_user_table = "CREATE TABLE IF NOT EXISTS User (
   user_id INT AUTO_INCREMENT,
   username VARCHAR(50) NOT NULL,
   user_email VARCHAR(50) NOT NULL UNIQUE,
   user_password VARCHAR(100) NOT NULL,
   is_banned BOOLEAN DEFAULT false,
   PRIMARY KEY (user_id)
);";

$create_missing_persons_table = "CREATE TABLE IF NOT EXISTS MissingPerson (
   missing_person_id INT AUTO_INCREMENT,
   user_id INT NOT NULL,
   missing_person_name VARCHAR(50) NOT NULL,
   missing_person_gender VARCHAR(20) NOT NULL,
   missing_person_photo VARCHAR(255) NOT NULL,
   missing_person_contact VARCHAR(255) NOT NULL,
   missing_person_story TEXT NOT NULL,
   missing_person_note TEXT NOT NULL,
   missing_person_age INT NOT NULL,
   missing_date DATETIME NOT NULL,
   missing_location VARCHAR(255) NOT NULL,
   illnesses VARCHAR(255),
   chemical_dependency VARCHAR(255),
   profile VARCHAR(255),
   car_plate VARCHAR(9),
   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
   updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(missing_person_id),
   FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);";

$create_missing_comments_table = "CREATE TABLE IF NOT EXISTS Comment (
   comment_id INT AUTO_INCREMENT,
   missing_person_id INT NOT NULL,
   user_id INT NOT NULL,
   content TEXT NOT NULL,
   created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (comment_id),
   FOREIGN KEY (missing_person_id) REFERENCES MissingPerson(missing_person_id) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (user_id) REFERENCES User(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);";


$connection->query($create_user_table);
$connection->query($create_missing_persons_table);
$connection->query($create_missing_comments_table);
