DROP DATABASE IF EXISTS edufun;

CREATE DATABASE edufun;

USE edufun;

CREATE TABLE users (
	usersId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersName VARCHAR(100) NOT NULL,
    usersEmail VARCHAR(100) NOT NULL,
    usersUid VARCHAR(100) NOT NULL,
    usersPwd VARCHAR(100) NOT NULL
);

CREATE TABLE `edufun`.(
    `id` INT NOT NULL AUTO_INCREMENT,
    `id_game` INT NOT NULL,
    `useruid` INT NOT NULL,
    `score` INT NOT NULL,
    PRIMARY KEY(`id`)
)