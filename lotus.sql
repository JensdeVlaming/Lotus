-- DROP DATABASE IF EXISTS `lotus`;
-- CREATE DATABASE `lotus`;
-- DROP DATABASE IF EXISTS `lotus-testdb`;
-- CREATE DATABASE `lotus-testdb`;

-- USE `lotus`;

--
-- Table structure for table registry_lotus
--

DROP TABLE IF EXISTS registry_lotus;
CREATE TABLE registry_lotus (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    phonenumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postcode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    PRIMARY KEY(email)
);

INSERT INTO registry_lotus (email,firstName,lastName,street,phonenumber,city,postcode,gender) VALUES
('kasper@lotus.nl','kasper','van den Enden','lotus','+316 12345678', 'Breda','1234AL','M'),
('juliet@lotus.nl','Juliet','van Bezooijen','lotus','+316 12345678','Breda','1234AL','V'),
('daniel@lotus.nl','Daniel','Zuijdam','lotus','+316 12345678','Breda','1234AL','M'),
('jens@lotus.nl','Jens','de Vlaming','lotus','+316 12345678', 'Breda','1234AL','M'),
('new@lotus.nl','New','Testaccount', 'teststraat','+316 99998888','Tilburg','4321LA','O');

--
-- Table structure for table account
--

DROP TABLE IF EXISTS account;
CREATE TABLE account (
    email varchar(100) NOT NULL,
    roles varchar(25) NOT NULL,
    PRIMARY KEY (email, roles)
);

INSERT INTO account VALUES
('kasper@lotus.nl','member'),
('juliet@lotus.nl','member'),
('daniel@lotus.nl','member'),
('jens@lotus.nl','member'),
('admin@lotus.nl','coordinator');

--
-- Table structure for table client_account
--

DROP TABLE IF EXISTS client_account;
CREATE TABLE client_account (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    phonenumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postcode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    pwd varchar(15) DEFAULT "secret",
    PRIMARY KEY(email)
);

INSERT INTO client_account (email,firstName,lastName,street,phonenumber,city,postcode,gender) VALUES
('clienta@lotus.nl','Client','A','lotus','+316 12345678', 'Breda','1234AL','M'),
('clientb@lotus.nl','Client','B','lotus','+316 12345678', 'Breda','1234AL','M');

--
-- Table structure for table member_account
--

DROP TABLE IF EXISTS member_account;
CREATE TABLE member_account (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    phonenumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postcode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    pwd varchar(15) DEFAULT "secret",
    PRIMARY KEY(email)
);

INSERT INTO member_account (email,firstName,lastName,street,phonenumber,city,postcode,gender) VALUES
('kasper@lotus.nl','kasper','van den Enden','lotus','+316 12345678','Breda','1234AL','M'),
('juliet@lotus.nl','Juliet','van Bezooijen','lotus','+316 12345678','Breda','1234AL','V'),
('daniel@lotus.nl','Daniel','Zuijdam','lotus','+316 12345678','Breda','1234AL','M'),
('jens@lotus.nl','Jens','de Vlaming','lotus','+316 12345678','Breda','1234AL','M');

--
-- Table structure for table coord_account
--

DROP TABLE IF EXISTS coord_account;
CREATE TABLE coord_account (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    phonenumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postcode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    pwd varchar(15) DEFAULT "secret",
    PRIMARY KEY(email)
);

INSERT INTO coord_account (email,firstName,lastName,street,phonenumber,city,postcode,gender) VALUES
('admin@lotus.nl','admin','lotus','lotus','+316 12345678','Breda','1234AL','O');

--
-- Table structure for table request
--

DROP TABLE IF EXISTS request;
CREATE TABLE request (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    requestName varchar(250) NOT NULL,
    summary varchar(500) NOT NULL,
    comments varchar(500) NULL,
    clientName varchar(250) NOT NULL,
    clientEmail varchar(100) NOT NULL,
    billingAddress varchar(200) NOT NULL,
    playDate varchar(100) NOT NULL,
    playTime varchar(100) NOT NULl,
    playGround varchar(200) NOT NULL,
    grimeGround varchar(200) NULL,
    lotusCasualties tinyint NOT NULL,
    approved tinyint NOT NULL DEFAULT 0,
    CreateDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP     
);
-- request whithout grimeGround with comments
INSERT INTO request (id,requestName,summary,comments,clientName,clientEmail,billingAddress,playDate,playTime,playGround,lotusCasualties,approved) VALUES
(10,'Amphia ziekenhuis','Steekwonden' ,'Messen en scharen' , 'Client A','clienta@lotus.nl' ,'Molengracht 21 4818 CK','12-6-2022' ,'12:00' ,'Amphiastraat 5 1234LA' ,10 ,0);
-- request whithout grimeGround without comments
INSERT INTO request (id,requestName,summary,clientName,clientEmail,billingAddress,playDate,playTime,playGround,lotusCasualties,approved) VALUES
(20,'Huisartsenpraktijd HB','Cuts and bruises' , 'Client B','clientb@lotus.nlv' ,'Haagsestraat 10 2587LJ' ,'6-12-2022' ,'10:00' ,'Haagsestraat 10 1234LA' ,3 ,1);
-- request with grimeGround with comments
INSERT INTO request (id,requestName,summary,comments,clientName,clientEmail,billingAddress,playDate,playTime,playGround,grimeGround,lotusCasualties,approved) VALUES
(5,'Amphia ziekenhuis','Steekwonden' ,'Messen en scharen' , 'Client A','clienta@lotus.nl' ,'Molengracht 25 4818 CK','Molengracht 25 4818 CK','12-6-2022' ,'12:00' ,'Amphiastraat 5 1234LA' ,10 ,0);
-- request with grimeGround without comments
INSERT INTO request (id,requestName,summary,clientName,clientEmail,billingAddress,playDate,playTime,playGround,grimeGround,lotusCasualties,approved) VALUES
(15,'Huisartsenpraktijd HB','Cuts and bruises' , 'Client B','clientb@lotus.nlv' ,'Haagsestraat 20 2587LJ','Haagsestraat 20 2587LJ' ,'6-12-2022' ,'10:00' ,'Haagsestraat 10 1234LA' ,3 ,1);

--
-- Table structure for table solicit
--

DROP TABLE IF EXISTS solicit;
CREATE TABLE solicit (
    email varchar(100) NOT NULL,
    requestId int NOT NULL,
    appointed varchar(25),
    PRIMARY KEY (email, requestId)
);

INSERT INTO solicit VALUES
('kasper@lotus.nl','1','pending'),
('juliet@lotus.nl','1','denied'),
('daniel@lotus.nl','1','pending'),
('jens@lotus.nl','1','denied');

--
-- Table structure for table assign
--

DROP TABLE IF EXISTS assign;
CREATE TABLE assign (
    email varchar(100) NOT NULL,
    requestId int NOT NULL,
    appointed varchar(25),
    PRIMARY KEY (email, requestId)
);

INSERT INTO assign VALUES
('juliet@lotus.nl','2','accepted'),
('daniel@lotus.nl','2','accepted'),
('jens@lotus.nl','2','accepted');
