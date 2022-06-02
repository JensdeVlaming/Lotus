-- user

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    email varchar(100) NOT NULL,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    street varchar(100) NOT NULL,
    premise varchar(1) NULL,
    phoneNumber varchar(15) NOT NULL,
    city varchar(50) NOT NULL,
    postalCode varchar(7) NOT NULL,
    gender varchar(1) NOT NULL,
    roles varchar(25) NOT NULL,
    password varchar(15) DEFAULT "secret",
    PRIMARY KEY(email)
);


-- client users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles) VALUES
('clienta@lotus.nl','Client','A','lotusstreet','1a','+316 12345678', 'Breda','1234AL','M','client'),
('clientb@lotus.nl','Client','B','lotusstreet','2b','+316 12345678', 'tilburg','1234AL','M','client');
-- member users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles) VALUES
('membera@lotus.nl','Member','A','memberstreet','1a','+316 12345678', 'Breda','1234AL','M','member'),
('memberb@lotus.nl','Member','B','memberstreet','2b','+316 12345678', 'tilburg','1234AL','M','member');
-- coord users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles) VALUES
('coord@lotus.nl','Coord','Inator','coordstreet','1a','+316 12345678', 'Breda','1234AL','M','coordinator');


-- solicit

DROP TABLE IF EXISTS solicit;
CREATE TABLE solicit (
    email varchar(100) NOT NULL,
    requestId int NOT NULL,
    approved tinyint NOT NULL DEFAULT 2,
    PRIMARY KEY (email, requestId)
);
-- 0 = denied / 1 = appointed / 2 = pending
INSERT INTO solicit VALUES
('kasper@lotus.nl','1',2),
('juliet@lotus.nl','1',0),
('daniel@lotus.nl','1',1),
('jens@lotus.nl','1',0);


-- billingaddress


DROP TABLE IF EXISTS `lotus`.`billingaddress`;
CREATE TABLE `lotus`.`billingaddress` (
  `billingAddressId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
);
ALTER TABLE `lotus`.`billingaddress` ADD PRIMARY KEY (`billingAddressId`);
ALTER TABLE `lotus`.`billingaddress` MODIFY `billingAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2 ;

INSERT INTO billingaddress (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO billingaddress (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO billingaddress (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");


-- company

DROP TABLE IF EXISTS `lotus`.`company`;
CREATE TABLE `lotus`.`company` (
  `companyId` int(11) NOT NULL,
  `companyName` varchar(50) NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
);
ALTER TABLE `lotus`.`company` ADD PRIMARY KEY (`companyId`);
ALTER TABLE `lotus`.`company` MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO company (country, province, city, street, houseNumber, postalCode, companyName) VALUES ("Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA", "Apotheek Brabantpark");
INSERT INTO company (country, province, city, street, houseNumber, postalCode, companyName) VALUES ("Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV", "Amphia Ziekenhuis Langendijk");
INSERT INTO company (country, province, city, street, houseNumber, postalCode, companyName) VALUES ("Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK", "Amphia Ziekenhuis Molengracht");


-- contact

DROP TABLE IF EXISTS `lotus`.`contact`;
CREATE TABLE `lotus`.`contact` (
  `contactId` int(11) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
);
ALTER TABLE `lotus`.`contact` ADD PRIMARY KEY (`contactId`);
ALTER TABLE `lotus`.`contact` MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO contact (firstName, lastName, email, phoneNumber) VALUES ("Jan", "Jansen", "janjansen@gmail.com", "06-12345678");
INSERT INTO contact (firstName, lastName, email, phoneNumber) VALUES ("Betty", "Bezem", "bettybezem@gmail.com", "06-12345678");


-- grimelocation

DROP TABLE IF EXISTS `lotus`.`grimelocation`;
CREATE TABLE `lotus`.`grimelocation` (
  `grimeLocationId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
);
ALTER TABLE `lotus`.`grimelocation` ADD PRIMARY KEY (`grimeLocationId`);
ALTER TABLE `lotus`.`grimelocation` MODIFY `grimeLocationId` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Lovensdijkstraat", 61, "4818 AJ");
INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Hogeschoollaan", 1, "4818 CR");
INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO grimelocation (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");


-- playground

DROP TABLE IF EXISTS `lotus`.`playground`;
CREATE TABLE `lotus`.`playground` (
  `playGroundId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
);
ALTER TABLE `lotus`.`playground` ADD PRIMARY KEY (`playGroundId`);
ALTER TABLE `lotus`.`playground` MODIFY `playGroundId` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO playground (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Hooghout", 65, "4817 EA");
INSERT INTO playground (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Langendijk", 75, "4819 EV");
INSERT INTO playground (country, province, city, street, houseNumber, postalCode) VALUES ("Nederland", "Noord-Brabant", "Breda", "Molengracht", 21, "4818 CK");


-- request


DROP TABLE IF EXISTS `lotus`.`request`;
CREATE TABLE `lotus`.`request` (
  `requestId` int(11) NOT NULL,
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
  `approved` tinyint NOT NULL DEFAULT 0
);
ALTER TABLE `lotus`.`request` ADD PRIMARY KEY (`requestId`), ADD KEY `FK_billing_request` (`billingAddressId`), ADD KEY `FK_company_request` (`companyId`), ADD KEY `FK_grimelocation_request` (`grimeLocationId`), ADD KEY `FK_playground_request` (`playGroundId`), ADD KEY `FK_contact_request` (`contactId`);
ALTER TABLE `lotus`.`request` MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3 ;

INSERT INTO request (description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES ("Steekwonden", "Cuts and bruises", "12-06-2022", "10:00", 10, 1, 1, 1, 1, 2);
INSERT INTO request (description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES ("Benauwdheid", "Paars gezicht", "14-06-2022", "12:00", 10, 2, 3, 1, 1, 4);
INSERT INTO request (description, comments, date, time, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId) VALUES ("Hersenschudding", "Hoofdpijn", "14-06-2022", "12:00", 10, 3, 3, 2, 2, 5);


INSERT INTO request(requestId,description,comments,date,time,casualties,playGroundId,grimelocationId,companyId,contactId,billingAddressId) VALUES
(20, 'desc','comm','6-12-22','11:00',5,1,1,1,1,1);
