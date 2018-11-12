CREATE DATABASE IF NOT EXISTS Msmeme CHARACTER SET utf8mb4;
USE Msmeme;

DROP TABLE IF EXISTS Amizades;
DROP TABLE IF EXISTS Mensagem;
DROP TABLE IF EXISTS Usuario;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	username VARCHAR(64) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	nickname CHAR(64) NOT NULL,
	frase CHAR(128) DEFAULT "Olá! Estou usando o MSMEME.",
	status INT NOT NULL,
	imagem VARCHAR(128) NOT NULL DEFAULT "padrao.png",
	PRIMARY KEY(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Amizades (
	emailUsuario1 VARCHAR(128) NOT NULL,
	emailUsuario2 VARCHAR(128) NOT NULL,
	pedido TINYINT(1) NOT NULL DEFAULT 1,
	PRIMARY KEY(emailUsuario1,emailUsuario2),
	FOREIGN KEY(emailUsuario1) REFERENCES Usuario(email),
	FOREIGN KEY(emailUsuario2) REFERENCES Usuario(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE IF NOT EXISTS Mensagem (
	idMensagem INT AUTO_INCREMENT,
	emailEnvio VARCHAR(128) NOT NULL,
	emailRecebimento VARCHAR(128) NOT NULL,
	conteudoMensagem VARCHAR(512) CHARACTER SET utf8mb4 NOT NULL,
	tipoMensagem INT,
	dataEnvio DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(idMensagem),
	FOREIGN KEY(emailEnvio) REFERENCES Usuario(email),
	FOREIGN KEY(emailRecebimento) REFERENCES Usuario(email)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

SET GLOBAL lc_time_names=pt_BR;
SET NAMES utf8mb4;