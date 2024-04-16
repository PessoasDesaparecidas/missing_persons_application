CREATE DATABASE DESAPARECIDOS;
USE DESAPARECIDOS;

/*Criação das tabelas*/
CREATE TABLE IF NOT EXISTS `usuarios` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`nome` INT NOT NULL,
	`email` INT NOT NULL,
	`senha` INT NOT NULL,
	`telefone` INT NOT NULL,
	`desaparecido_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `desaparecidos` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`contato_id` INT NOT NULL,
	`nome` INT NOT NULL,
	`nome_social` INT NOT NULL,
	`idade` INT NOT NULL,
	`foto` BLOB NOT NULL,
	`genero` VARCHAR(15) NOT NULL,
	`caracteristica` VARCHAR(255) NOT NULL,
	`visto_por_ultimo` DATE NOT NULL,
	`historia` VARCHAR(50) NOT NULL,
	`regiao` CHAR(9) NOT NULL,
	`esta_desaparecido` BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `banidos` (
	`user_id` int AUTO_INCREMENT NOT NULL UNIQUE,
	PRIMARY KEY (`user_id`)
);

CREATE TABLE IF NOT EXISTS `contatos` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`numero` INT NOT NULL,
	PRIMARY KEY (`id`)
);

/*DELETANDO TABELA*/
DROP TABLE `usuarios`;
DROP TABLE `desaparecidos`;
DROP TABLE `banidos`;
DROP TABLE `contatos`;

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

/*populando banco de dados*/

/*deletand base de dados*/
DELETE FROM `usuarios` WHERE TRUE;
DELETE FROM `desaparecidos` WHERE TRUE;
DELETE FROM `banidos` WHERE TRUE;
DELETE FROM `contatos`WHERE TRUE;

/*adicinamento das restrições com foreing key */
ALTER TABLE `usuarios` ADD CONSTRAINT `usuarios_fk5` FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecidos`(`id`);
ALTER TABLE `desaparecidos` ADD CONSTRAINT `desaparecidos_fk1` FOREIGN KEY (`contato_id`) REFERENCES `contatos`(`id`);
ALTER TABLE `banidos` ADD CONSTRAINT `banidos_fk0` FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`);
