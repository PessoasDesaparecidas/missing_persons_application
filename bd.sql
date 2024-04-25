CREATE DATABASE app;
USE app;

/*Criação das tabelas*/

CREATE TABLE IF NOT EXISTS `contatos` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`numero` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);
CREATE TABLE `desaparecidos` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`contato_id` INT ,
	`user_id` INT ,
    `nome` VARCHAR(100) NOT NULL,
	`nome_social` VARCHAR(100) NOT NULL,
	`idade` INT(3) NOT NULL,
	`foto` BLOB NOT NULL,
	`genero` VARCHAR(15) NOT NULL,
	`caracteristica` TEXT NOT NULL,
	`visto_por_ultimo` DATE NOT NULL,
	`historia` VARCHAR(50) NOT NULL,
	`regiao` VARCHAR(9) NOT NULL,
	`esta_desaparecido` BOOLEAN   DEFAULT true,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
	FOREIGN KEY (`contato_id`) REFERENCES `contatos`(`id`),
    FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`)
);
CREATE TABLE `usuarios` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`nome` VARCHAR(100) NOT NULL,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`senha` VARCHAR(12)  NOT NULL,
	`telefone` INT(11) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `banidos` (
	`user_id` INT NOT NULL,
	FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`)
);

/*DELETANDO TABELA*/
DROP TABLE `banidos`;
DROP TABLE `desaparecidos`;
DROP TABLE `contatos`;
DROP TABLE `usuarios`;
/*Descrição das tabelas*/
DESCRIBE `usuarios`;
DESCRIBE `desaparecidos`;
DESCRIBE `banidos`;
DESCRIBE `contatos`;

/*obter os dados*/
SELECT * FROM `usuarios`;
SELECT * FROM `desaparecidos`;
SELECT * FROM `banidos`;
SELECT * FROM `contatos`;

/*com seu relacionamento*/
SELECT emial
FROM desaparecidos
INNER JOIN usuarios ON desaparecidos.user_id = usuarios.id;

/*populando banco de dados*/
/*usuarios*/
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('fulano','fulano@gmail.com','12345678',967603371);
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('ciclano','ciclano@gmail.com','12345678',967603372);
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('deutrano','deutrano@gmail.com','12345678',967603373);
/*desaparecidos*/
INSERT INTO `desaparecidos`(`id`,`contato_id`,`user_id`,`nome`,`nome_social`,`idade`,`foto`,`genero`,`caracteristica`,`visto_por_ultimo`,`historia`,`regiao`,`esta_desaparecido`) 
VALUES(null,null,'1','henry','panko',17,'./assets/image.jpg','masculino','no tengo','2024-04-25 11:47:14','henry um jovem estudante da etec','norte',null);



/*deletand base de dados*/
DELETE FROM `usuarios`;
DELETE FROM `desaparecidos`;
DELETE FROM `banidos`;
DELETE FROM `contatos`;
