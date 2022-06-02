-- 
-- Gebruik dit script om je lokale database, en je test-database te maken.
-- LET OP: je moet als root ingelogd zijn om dit script uit te kunnen voeren.
-- Dit script creëert de database, de user, en opent de nieuwe database.
-- Daarna kun je het lotus.sql script importeren.
-- In de connection settings gebruik je dan de nieuwe database, de user en het password.
-- 
DROP DATABASE IF EXISTS `lotus`;
CREATE DATABASE `lotus`;
DROP DATABASE IF EXISTS `lotus-testdb`;
CREATE DATABASE `lotus-testdb`;
-- lotus-user aanmaken
CREATE USER IF NOT EXISTS 'lotus-user'@'localhost' IDENTIFIED BY 'secret';
CREATE USER IF NOT EXISTS 'lotus-user'@'%' IDENTIFIED BY 'secret';
-- geef rechten aan deze user
GRANT SELECT, INSERT, DELETE, UPDATE ON `lotus`.* TO 'lotus-user'@'%';
GRANT SELECT, INSERT, DELETE, UPDATE ON `lotus-testdb`.* TO 'lotus-user'@'%';

USE `lotus`;