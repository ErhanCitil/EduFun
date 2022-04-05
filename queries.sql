DROP DATABASE IF EXISTS edufun;

CREATE DATABASE edufun;

USE edufun;

CREATE TABLE `users` (
	usersId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersName VARCHAR(100) NOT NULL,
    usersEmail VARCHAR(100) NOT NULL,
    usersUid VARCHAR(100) NOT NULL,
    usersPwd VARCHAR(100) NOT NULL
);

CREATE TABLE `quiz-score` (
    id int(11) NOT NULL AUTO_INCREMENT,
    score int NOT NULL,
    useruid int,
    PRIMARY KEY (id),
    CONSTRAINT FK_PersnOrder FOREIGN KEY (useruid)
    REFERENCES users(usersId)
);

SELECT users.usersUid, quiz_score.score
FROM users
INNER JOIN quiz_score ON users.usersUid = quiz_score.useruid;


CREATE TABLE `wordle` (
    id int(11) NOT NULL AUTO_INCREMENT,
    timesamp date NOT NULL,
    useruid int,
    PRIMARY KEY (id),
    CONSTRAINT FK_PersnOder FOREIGN KEY (useruid)
    REFERENCES users(usersId)
);

ALTER TABLE `wordle` ADD `complete` VARCHAR NOT NULL ;