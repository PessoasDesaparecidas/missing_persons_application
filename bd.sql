CREATE DATABASE tcc;
USE tcc;

/* Criação das tabelas */
DROP TABLE Desaparecido;
DROP TABLE Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	 user_id INT AUTO_INCREMENT,
	 username VARCHAR(50) NOT NULL,
	 email_usuario VARCHAR(50) NOT NULL UNIQUE,
	 password_usuario VARCHAR(20) NOT NULL,
     esta_banido BOOLEAN  DEFAULT True,
	PRIMARY KEY (user_id)
);

CREATE TABLE IF NOT EXISTS Desaparecido (
	missing_person_id INT  AUTO_INCREMENT ,
    user_id INT,
	missing_person_name VARCHAR(50) NOT NULL,
	missing_person_photo VARCHAR(255) NOT NULL,
    missing_person_contact INT NOT NULL,
    missing_person_note TEXT NOT NULL,
    data_nascimento DATE NOT NULL,
    missing_date DATE NOT NULL,
    missing_location VARCHAR(255) NOT NULL,
    PRIMARY KEY(missing_person_id),
    foreign key (user_id) REFERENCES Usuario(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);



/* Populando o Banco de dados */

-- Populando a tabela Usuario
INSERT INTO Usuario (username, email_usuario, password_usuario, esta_banido)
VALUES
    ('João Silva', 'joao.silva@email.com', '123456', False),
    ('Maria Santos', 'maria.santos@email.com', 'password123', False),
    ('Carlos Oliveira', 'carlos.oliveira@email.com', 'minhapassword', True);

-- Populando a tabela Desaparecido
INSERT INTO Desaparecido 
(user_id, missing_person_name, missing_person_photo, missing_person_contact, missing_person_note, missing_date ,data_nascimento, missing_location)
VALUES
    (1, 'Ana Silva', 'ImagemB64aqui', 123456789, 'Descrição do desaparecimento...','2024-01-24', '1990-05-15', 'Cidade A'),
    (2, 'Pedro Santos', 'ImagemB64aqui', 987654321, 'Outra descrição...', '2023-11-04','1985-10-20', 'Cidade B'),
    (3, 'Fernanda Oliveira', 'ImagemB64aqui', 555555555, 'Mais uma descrição...','2024-01-22' ,'2000-03-25', 'Cidade C'),
	(1, 'Ana julia', 'ImagemB64aqui', 123456784, 'Descrição do desaparecimento...', '2024-04-12','1990-05-15', 'Cidade A'),
    (2, 'João pedro', 'ImagemB64aqui', 987654325, 'Outra descrição...', '2024-03-04','1985-10-20', 'Cidade B'),
    (3, 'Fernanda dias', 'ImagemB64aqui', 555555554, 'Mais uma descrição...', '2024-02-14','2000-03-25', 'Cidade C');




/* selecionando dados */
 -- usuario
SELECT username,email_usuario,password_usuario  FROM Usuario;
-- um derteminado usuario 
SELECT username,email_usuario,password_usuario  FROM Usuario  WHERE user_id= 1; 

-- verificando se esta banido 
SELECT username,email_usuario,password_usuario  FROM Usuario  
WHERE user_id= 1 AND esta_banido = FALSE;

-- usuario com seu desaparecidos

SELECT Desaparecido.*  FROM Usuario LEFT  JOIN  Desaparecido 
ON Desaparecido.user_id = Usuario.user_id 
WHERE Usuario.user_id =  1 AND Usuario.esta_banido=FALSE;

SELECT * FROM Desaparecido;

-- deletar 

DELETE FROM Usuario WHERE user_id = 3;
DELETE FROM Desaparecido WHERE user_id = 3;
DELETE FROM `desaparecido` WHERE `desaparecido`.`missing_person_id` = 3

-- atualizar 

UPDATE Usuario 
SET username = "Henry"
WHERE user_id = 1;

UPDATE Desaparecido 
SET missing_person_name = "fulano"
WHERE missing_person_id = 1;