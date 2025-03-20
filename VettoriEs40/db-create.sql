CREATE DATABASE nome_utenti;

USE nome_utenti;

CREATE TABLE tipo (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
);

CREATE TABLE utente (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_tipo INT NOT NULL,
    FOREIGN KEY (id_tipo) REFERENCES tipo(id)
);

INSERT INTO tipo (nome) VALUES ('admin');
INSERT INTO tipo (nome) VALUES ('organizzazione');
INSERT INTO tipo (nome) VALUES ('persona');
