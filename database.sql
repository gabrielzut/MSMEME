CREATE DATABASE IF NOT EXISTS Msmeme;
USE Msmeme;

CREATE TABLE IF NOT EXISTS Usuario (
	email VARCHAR(128),
	username VARCHAR(64) NOT NULL,
	senha VARCHAR(64) NOT NULL,
	nickname VARCHAR(64) NOT NULL,
	frase VARCHAR(128) DEFAULT "Olá! Estou usando o MSMEME.",
	status INT NOT NULL,
	imagem VARCHAR(128) NOT NULL DEFAULT "padrao.png",
	PRIMARY KEY(email)
);

CREATE TABLE IF NOT EXISTS Amizades (
	emailUsuario1 VARCHAR(128) NOT NULL,
	emailUsuario2 VARCHAR(128) NOT NULL,
	pedido TINYINT(1) NOT NULL DEFAULT 1,
	PRIMARY KEY(emailUsuario1,emailUsuario2),
	FOREIGN KEY(emailUsuario1) REFERENCES Usuario(email),
	FOREIGN KEY(emailUsuario2) REFERENCES Usuario(email)
);

CREATE TABLE IF NOT EXISTS Mensagem (
	idMensagem INT AUTO_INCREMENT,
	emailEnvio VARCHAR(128) NOT NULL,
	emailRecebimento VARCHAR(128) NOT NULL,
	conteudoMensagem TEXT NOT NULL,
	dataEnvio DATE NOT NULL,
	PRIMARY KEY(idMensagem),
	FOREIGN KEY(emailEnvio) REFERENCES Usuario(email),
	FOREIGN KEY(emailRecebimento) REFERENCES Usuario(email)
);