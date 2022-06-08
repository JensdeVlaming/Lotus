-- 
-- Gebruik dit script om je lokale database, en je test-database te maken.
-- LET OP: je moet als root ingelogd zijn om dit script uit te kunnen voeren.
-- Dit script creëert de database, de user, en opent de nieuwe database.
-- Daarna kun je het lotus.sql script importeren.
-- In de connection settings gebruik je dan de nieuwe database, de user en het password.
-- 


-- DROP DATABASE IF EXISTS `lotus`;
-- CREATE DATABASE `lotus`;
-- DROP DATABASE IF EXISTS `lotus-testdb`;
-- CREATE DATABASE `lotus-testdb`;


-- -- lotus-user aanmaken
-- CREATE USER IF NOT EXISTS 'lotus-user'@'localhost' IDENTIFIED BY 'secret';
-- CREATE USER IF NOT EXISTS 'lotus-user'@'%' IDENTIFIED BY 'secret';


-- -- geef rechten aan deze user
-- GRANT SELECT, INSERT, DELETE, UPDATE ON `lotus`.* TO 'lotus-user'@'%';
-- GRANT SELECT, INSERT, DELETE, UPDATE ON `lotus-testdb`.* TO 'lotus-user'@'%';

-- USE `lotus`;

DROP TABLE IF EXISTS `lotus`.`solicit`;
DROP TABLE IF EXISTS `lotus`.`user`;
DROP TABLE IF EXISTS `lotus`.`role`;
DROP TABLE IF EXISTS `lotus`.`request`;
DROP TABLE IF EXISTS `lotus`.`grimelocation`;
DROP TABLE IF EXISTS `lotus`.`playground`;
DROP TABLE IF EXISTS `lotus`.`billingaddress`;
DROP TABLE IF EXISTS `lotus`.`contact`;
DROP TABLE IF EXISTS `lotus`.`company`;

-- role

CREATE TABLE `lotus`.`role` (
    `id` int AUTO_INCREMENT,
    `name` varchar(16) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO `role` (id, name) VALUES
(1, 'Lid');

INSERT INTO `role` (id, name) VALUES
(2, 'Coordinator');

INSERT INTO `role` (id, name) VALUES
(3, 'Opdrachtgever');

INSERT INTO `role` (id, name) VALUES
(4, 'Coordinator,Lid');

-- user

CREATE TABLE `lotus`.`user` (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    premise varchar(1) NULL,
    phoneNumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postalCode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    roles int NOT NULL DEFAULT 1,
    password varchar(15) NOT NULL,
    PRIMARY KEY(email),
    CONSTRAINT FK_UserRoles FOREIGN KEY (roles) REFERENCES role(id) ON UPDATE CASCADE ON DELETE CASCADE
);

-- client users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles, password) VALUES
('clienta@lotus.nl','Client','A','lotusstreet','1a','+316 12345678', 'Breda','1234AL','M', 3, "secret"),
('clientb@lotus.nl','Client','B','lotusstreet','2b','+316 12345678', 'tilburg','1234AL','M', 3, "secret"),
('jens@lotus.nl','Jens','de Vlaming','Burgemeester Beelaertspark','12','06 20529433', 'Dordrecht','3319AV','M', 1, "secret"),
('daniel@lotus.nl','Daniel','Zuijdam', 'Lotusstraat', '1', '06 12345678', 'Breda', '000AX', 'V', 1, "secret"),
('kasper@lotus.nl','Kasper','van den Enden', 'Lotusstraat', '1', '06 12345678', 'Breda', '000AX', 'V', 1, "secret"),
('juliet@lotus.nl', 'Juliet', 'van Bezooyen', 'Lotusstraat', '1', '06 12345678', 'Breda', '000AX', 'V', 1, "secret");
-- member users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles, password) VALUES
('membera@lotus.nl','Member','A','memberstreet','1a','+316 12345678', 'Breda','1234AL','M', 1, "secret"),
('memberb@lotus.nl','Member','B','memberstreet','2b','+316 12345678', 'tilburg','1234AL','M', 1, "secret");
-- coord users
INSERT INTO user (email, firstName, lastName, street, premise, phonenumber, city, postalCode, gender, roles, password) VALUES
('coord@lotus.nl','Coord','Inator','coordstreet','1a','+316 12345678', 'Breda','1234AL','M', 4, "secret");

-- company

CREATE TABLE `lotus`.`company` (
    `companyId` int(11) NOT NULL AUTO_INCREMENT,
    `companyName` varchar(50) NULL,
    `cCountry` varchar(200) NOT NULL,
    `cProvince` varchar(200) NOT NULL,
    `cCity` varchar(200) NOT NULL,
    `cStreet` varchar(200) NOT NULL,
    `cHouseNumber` varchar(10) NOT NULL,
    `cPostalCode` varchar(10) NOT NULL,
    PRIMARY KEY(companyId)

);

-- contact

CREATE TABLE `lotus`.`contact` (
    `contactId` int(11) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(200) NOT NULL,
    `lastName` varchar(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    `phoneNumber` varchar(15) NOT NULL,
    PRIMARY KEY(contactId)
);

-- grimelocation

CREATE TABLE `lotus`.`grimelocation` (
    `grimeLocationId` int(11) NOT NULL AUTO_INCREMENT,
    `gCountry` varchar(200) NOT NULL,
    `gProvince` varchar(200) NOT NULL,
    `gCity` varchar(200) NOT NULL,
    `gStreet` varchar(200) NOT NULL,
    `gHouseNumber` varchar(10) NOT NULL,
    `gPostalCode` varchar(10) NOT NULL,
    PRIMARY KEY(grimeLocationId)
);

-- playground

CREATE TABLE `lotus`.`playground` (
    `playGroundId` int(11) NOT NULL AUTO_INCREMENT,
    `pCountry` varchar(200) NOT NULL,
    `pProvince` varchar(200) NOT NULL,
    `pCity` varchar(200) NOT NULL,
    `pStreet` varchar(200) NOT NULL,
    `pHouseNumber` varchar(10) NOT NULL,
    `pPostalCode` varchar(10) NOT NULL,
    PRIMARY KEY(playGroundId)

);

-- billingaddress

CREATE TABLE `lotus`.`billingaddress` (
    `billingAddressId` int(11) NOT NULL AUTO_INCREMENT,
    `bCountry` varchar(200) NOT NULL,
    `bProvince` varchar(200) NOT NULL,
    `bCity` varchar(200) NOT NULL,
    `bStreet` varchar(200) NOT NULL,
    `bHouseNumber` varchar(10) NOT NULL,
    `bPostalCode` varchar(10) NOT NULL,
    PRIMARY KEY (billingAddressId)
);

-- request

CREATE TABLE `lotus`.`request` (
    `requestId` int NOT NULL AUTO_INCREMENT,
    `description` text NOT NULL,
    `comments` text DEFAULT NULL,
    `date` varchar(10) NOT NULL,
    `time` varchar(5) NOT NULL,
    `casualties` int(3) NOT NULL,
    `playGroundId` int(11) NOT NULL,
    `grimeLocationId` int(11) NOT NULL,
    `companyId` int(11) NOT NULL,
    `contactId` int(11) NOT NULL,
    `billingAddressId` int(11) NOT NULL,
    `postDate` datetime NOT NULL DEFAULT current_timestamp(),
    `approved` tinyint NOT NULL DEFAULT 0,
    `clientEmail` varchar(100) NOT NULL,
    PRIMARY KEY(requestId),
    CONSTRAINT FK_RequestBillingaddress FOREIGN KEY (billingAddressId) REFERENCES billingaddress(billingAddressId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestCompany FOREIGN KEY (companyId) REFERENCES company(companyId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestContact FOREIGN KEY (contactId) REFERENCES contact(contactId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestGrimelocation FOREIGN KEY (grimeLocationId) REFERENCES grimelocation(grimeLocationId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestPlaygroundt FOREIGN KEY (playGroundId) REFERENCES playground(playGroundId) ON UPDATE CASCADE ON DELETE CASCADE
);

-- solicit

DROP TABLE IF EXISTS solicit;
CREATE TABLE solicit (
    email varchar(100) NOT NULL,
    requestId int NOT NULL,
    assigned tinyint NOT NULL DEFAULT 0,
    PRIMARY KEY (email, requestId),
    CONSTRAINT FK_SolicitUser FOREIGN KEY (email) REFERENCES user(email) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_SolicitRequest FOREIGN KEY (requestId) REFERENCES request(requestId) ON UPDATE CASCADE ON DELETE CASCADE
);

-- billingaddress
INSERT INTO billingaddress (billingAddressId, bCountry, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES (1, "Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO billingaddress (billingAddressId, bCountry, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES (2, "Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO billingaddress (billingAddressId, bCountry, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES (3, "Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");

-- company
INSERT INTO company (companyId, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode, companyName) VALUES (1, "Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA", "Apotheek Brabantpark");
INSERT INTO company (companyId, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode, companyName) VALUES (2, "Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV", "Amphia Ziekenhuis Langendijk");
INSERT INTO company (companyId, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode, companyName) VALUES (3, "Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK", "Amphia Ziekenhuis Molengracht");

-- contact
INSERT INTO contact (contactId, firstName, lastName, email, phoneNumber) VALUES (1, "Jan", "Jansen", "janjansen@gmail.com", "06-12345678");
INSERT INTO contact (contactId, firstName, lastName, email, phoneNumber) VALUES (2, "Betty", "Bezem", "bettybezem@gmail.com", "06-12345678");

-- grimelocation
INSERT INTO grimelocation (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES (1, "Nederland", "Noord-Brabant", "Breda", "Lovensdijkstraat", 61, "4818 AJ");
INSERT INTO grimelocation (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES (2, "Nederland", "Noord-Brabant", "Breda", "Hogeschoollaan", 1, "4818 CR");
INSERT INTO grimelocation (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES (3, "Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO grimelocation (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES (4, "Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO grimelocation (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES (5, "Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");

-- playground
INSERT INTO playground (playGroundId, pCountry, pProvince, pCity, pStreet, pHouseNumber, pPostalCode) VALUES (1, "Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO playground (playGroundId, pCountry, pProvince, pCity, pStreet, pHouseNumber, pPostalCode) VALUES (2, "Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO playground (playGroundId, pCountry, pProvince, pCity, pStreet, pHouseNumber, pPostalCode) VALUES (3, "Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");


-- request
INSERT INTO request (requestId, description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES (1, "Steekwonden", "Cuts and bruises", "12-06-2022", "10:00", 10, 1, 1, 1, 1, 2);
INSERT INTO request (requestId, description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES (2, "Benauwdheid", "Paars gezicht", "14-06-2022", "12:00", 10, 2, 3, 1, 1, 1);
INSERT INTO request (requestId, description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES (3, "Hersenschudding", "Hoofdpijn", "14-06-2022", "12:00", 10, 3, 3, 2, 2, 3);

-- solicit
-- 0 = ingeschreven / 1 = toegewezen / 2 = niet toegewezen
INSERT INTO solicit VALUES
('kasper@lotus.nl','1',2),
('juliet@lotus.nl','2',0),
('daniel@lotus.nl','1',1),
('jens@lotus.nl','1',0),
('membera@lotus.nl','3',1),
('memberb@lotus.nl','3',2);








