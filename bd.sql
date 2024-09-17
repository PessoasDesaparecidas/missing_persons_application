CREATE DATABASE tcc;
USE tcc;

/* Criação das tabelas */
DROP TABLE Desaparecido;
DROP TABLE Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	 id_usuario INT AUTO_INCREMENT,
	 nome_usuario VARCHAR(50) NOT NULL,
	 email_usuario VARCHAR(50) NOT NULL UNIQUE,
	 senha_usuario VARCHAR(20) NOT NULL,
     esta_banido BOOLEAN  DEFAULT True,
	PRIMARY KEY (id_usuario)
);

CREATE TABLE IF NOT EXISTS Desaparecido (
	id_desaparecido INT  AUTO_INCREMENT ,
    id_usuario INT,
	nome_desaparecido VARCHAR(50) NOT NULL,
	foto_desaparecido VARCHAR(255) NOT NULL,
    contato_desaparecido INT NOT NULL,
    observacao_desaparecido TEXT NOT NULL,
    data_nascimento DATE NOT NULL,
    data_desaparecimento DATE NOT NULL,
    local_desaparecimento VARCHAR(255) NOT NULL,
    PRIMARY KEY(id_desaparecido),
    foreign key (id_usuario) REFERENCES Usuario(id_usuario) ON DELETE CASCADE ON UPDATE CASCADE
);



/* Populando o Banco de dados */

-- Populando a tabela Usuario
INSERT INTO Usuario (nome_usuario, email_usuario, senha_usuario, esta_banido)
VALUES
    ('João Silva', 'joao.silva@email.com', '123456', False),
    ('Maria Santos', 'maria.santos@email.com', 'senha123', False),
    ('Carlos Oliveira', 'carlos.oliveira@email.com', 'minhasenha', True);

-- Populando a tabela Desaparecido
INSERT INTO Desaparecido 
(id_usuario, nome_desaparecido, foto_desaparecido, contato_desaparecido, observacao_desaparecido, data_desaparecimento ,data_nascimento, local_desaparecimento)
VALUES
    (1, 'Ana Silva', 'ImagemB64aqui', 123456789, 'Descrição do desaparecimento...','2024-01-24', '1990-05-15', 'Cidade A'),
    (2, 'Pedro Santos', 'ImagemB64aqui', 987654321, 'Outra descrição...', '2023-11-04','1985-10-20', 'Cidade B'),
    (3, 'Fernanda Oliveira', 'ImagemB64aqui', 555555555, 'Mais uma descrição...','2024-01-22' ,'2000-03-25', 'Cidade C'),
	(1, 'Ana julia', 'ImagemB64aqui', 123456784, 'Descrição do desaparecimento...', '2024-04-12','1990-05-15', 'Cidade A'),
    (2, 'João pedro', 'ImagemB64aqui', 987654325, 'Outra descrição...', '2024-03-04','1985-10-20', 'Cidade B'),
    (3, 'Fernanda dias', 'ImagemB64aqui', 555555554, 'Mais uma descrição...', '2024-02-14','2000-03-25', 'Cidade C');




/* selecionando dados */
 -- usuario
SELECT nome_usuario,email_usuario,senha_usuario  FROM Usuario;
-- um derteminado usuario 
SELECT nome_usuario,email_usuario,senha_usuario  FROM Usuario  WHERE id_usuario= 1; 

-- verificando se esta banido 
SELECT nome_usuario,email_usuario,senha_usuario  FROM Usuario  
WHERE id_usuario= 1 AND esta_banido = FALSE;

-- usuario com seu desaparecidos

SELECT Desaparecido.*  FROM Usuario LEFT  JOIN  Desaparecido 
ON Desaparecido.id_usuario = Usuario.id_usuario 
WHERE Usuario.id_usuario =  1 AND Usuario.esta_banido=FALSE;

SELECT * FROM Desaparecido;

-- deletar 

DELETE FROM Usuario WHERE id_usuario = 3;
DELETE FROM Desaparecido WHERE id_usuario = 3;
DELETE FROM `desaparecido` WHERE `desaparecido`.`id_desaparecido` = 3

-- atualizar 

UPDATE Usuario 
SET nome_usuario = "Henry"
WHERE id_usuario = 1;

UPDATE Desaparecido 
SET nome_desaparecido = "fulano"
WHERE id_desaparecido = 1;