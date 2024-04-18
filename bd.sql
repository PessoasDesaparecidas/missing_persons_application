CREATE DATABASE app;
USE app;

/*Criação das tabelas*/

CREATE TABLE IF NOT EXISTS `contatos` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`numero` INT(11) NOT NULL,
	PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `desaparecidos` (
	`id` int AUTO_INCREMENT NOT NULL UNIQUE,
	`contato_id` INT NOT NULL,
	`nome` VARCHAR(100) NOT NULL,
	`nome_social` VARCHAR(100) NOT NULL,
	`idade` INT(3) NOT NULL,
	`foto` BLOB NOT NULL,
	`genero` VARCHAR(15) NOT NULL,
	`caracteristica` TEXT NOT NULL,
	`visto_por_ultimo` DATE NOT NULL,
	`historia` VARCHAR(50) NOT NULL,
	`regiao` VARCHAR(9) NOT NULL,
	`esta_desaparecido` BOOLEAN NOT NULL DEFAULT true,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
	FOREIGN KEY (`contato_id`) REFERENCES `contatos`(`id`)
);
CREATE TABLE IF NOT EXISTS `usuarios` (
	`id` INT AUTO_INCREMENT NOT NULL UNIQUE,
	`nome` VARCHAR(100) NOT NULL,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`senha` VARCHAR(12)  NOT NULL,
	`telefone` INT(11) NOT NULL,
	`desaparecido_id` INT ,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecidos`(`id`)
);

CREATE TABLE IF NOT EXISTS `banidos` (
	`user_id` INT NOT NULL,
	FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`)
);



/*DELETANDO TABELA*/
DROP TABLE `banidos`;
DROP TABLE `usuarios`;
DROP TABLE `desaparecidos`;
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
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('fulano','fulano@gmail.com','12345678',967603371);
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('ciclano','ciclano@gmail.com','12345678',967603372);
INSERT INTO `usuarios`(`nome`,`email`,`senha`,`telefone`) VALUES('deutrano','deutrano@gmail.com','12345678',967603373);




/*deletand base de dados*/
DELETE FROM `usuarios`;
DELETE FROM `desaparecidos`;
DELETE FROM `banidos`;
DELETE FROM `contatos`;

/*adicinamento das restrições com foreing key */
ALTER TABLE `usuarios` ADD CONSTRAINT `usuarios_fk5` FOREIGN KEY (`desaparecido_id`) REFERENCES `desaparecidos`(`id`);
ALTER TABLE `usuarios` ADD CONSTRAINT email UNIQUE (email);
ALTER TABLE `desaparecidos` ADD CONSTRAINT `desaparecidos_fk1` FOREIGN KEY (`contato_id`) REFERENCES `contatos`(`id`);
ALTER TABLE `banidos` ADD CONSTRAINT `banidos_fk0` FOREIGN KEY (`user_id`) REFERENCES `usuarios`(`id`);
