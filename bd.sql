CREATE DATABASE app;
USE app;

/* Criação das tabelas */

CREATE TABLE IF NOT EXISTS `Usuario` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`nome` varchar(50) NOT NULL,
	`email` varchar(50) NOT NULL,
	`senha` varchar(20) NOT NULL,
	`telefone` int NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `Desaparecido` (
	`id` int AUTO_INCREMENT ,
	`nome_desaparecido` varchar(50) NOT NULL,
	`nome_social` varchar(50) NOT NULL,
	`idade` int NOT NULL,
	`foto` int NOT NULL,
	`genero` varchar(15) NOT NULL,
	`caracteristica` varchar(255) NOT NULL,
	`visto_por_ultimo` date NOT NULL,
	`historia` text NOT NULL,
	`regiao` char(20) NOT NULL,
	`esta_desaparecido` boolean NOT NULL DEFAULT true,
	`usuario_id` int,
	PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `Contato` (
	`id` int AUTO_INCREMENT ,
	`numero` int NOT NULL,
	`desaparecido_id` int NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `Desaparecido` ADD CONSTRAINT `desaparecido_fk11` FOREIGN KEY (`usuario_id`) REFERENCES `usuario`(`id`);
ALTER TABLE `Contato` ADD CONSTRAINT `contato_fk2` FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecido`(`id`);

/* Populando o Banco de dados */
-- Inserindo usuários
INSERT INTO Usuario (nome, email, senha, telefone) VALUES
('João', 'joao@example.com', 'senha123', 123456789),
('Maria', 'maria@example.com', 'senha456', 987654321),
('Pedro', 'pedro@example.com', 'senha789', 111223344);

-- Inserindo desaparecido
INSERT INTO Desaparecido (nome_desaparecido, nome_social, idade, foto, genero, caracteristica, visto_por_ultimo, historia, regiao, esta_desaparecido, usuario_id) VALUES
('Fernanda', 'Fernanda Silva', 20, 1, 'Feminino', 'Cabelo preto, olhos castanhos', '2024-01-15', 'Fernanda desapareceu enquanto voltava para casa do trabalho.', 'Zona Sul', true, 1),
('Carlos', 'Carlos Oliveira', 25, 2, 'Masculino', 'Altura média, cabelo curto', '2024-02-20', 'Carlos desapareceu após uma briga de bar.', 'Zona Oeste', true, 1),
('Ana', 'Ana Santos', 18, 3, 'Feminino', 'Cabelo ruivo, sardas no rosto', '2024-03-10', 'Ana desapareceu durante uma festa de aniversário.', 'Zona Leste', true, 2),
('Mariana', 'Mariana Lima', 22, 4, 'Feminino', 'Cabelo loiro, olhos verdes', '2024-01-05', 'Mariana desapareceu depois de uma discussão com o namorado.', 'Zona Norte', true, 2),
('Roberto', 'Roberto Souza', 30, 5, 'Masculino', 'Tatuagem no braço direito', '2024-02-15', 'Roberto desapareceu após sair para uma caminhada.', 'Centro', true, 3);

-- Inserindo contato
INSERT INTO Contato (numero, desaparecido_id) VALUES
(111111111, 1),
(222222222, 1),
(333333333, 2),
(444444444, 2),
(555555555, 3),
(666666666, 3),
(777777777, 4),
(888888888, 4),
(999999999, 5),
(1010101010, 5);




/* selecionando dados */
 -- usuario
SELECT * FROM Usuario;
-- um derteminado usuario 
SELECT nome,email,senha  FROM usuario  WHERE id= 1; 

-- verificando se esta banido 
SELECT nome,email,senha
FROM Usuario WHERE id = 1 AND esta_banido = true;

-- usuario com seu desaparecidos
SELECT Desaparecido.* FROM Usuario LEFT  JOIN  Desaparecido ON Desaparecido.usuario_id = Usuario.id WHERE Usuario.id =  1 ;
