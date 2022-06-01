/* -- DROP DATABASE IF EXISTS `lotus`;
-- CREATE DATABASE `lotus`;
-- DROP DATABASE IF EXISTS `lotus-testdb`;
-- CREATE DATABASE `lotus-testdb`;

-- USE `lotus`;

--
-- Table structure for table registry_lotus
--

-- DROP TABLE IF EXISTS registry_lotus;
-- CREATE TABLE registry_lotus (
--     email varchar(100) NOT NULL,
--     firstName varchar(50) NOT NULL,
--     lastName varchar(50) NOT NULL,
--     street varchar(100) NOT NULL,
--     phonenumber varchar(15) NOT NULL,
--     city varchar(50) NOT NULL,
--     postalCode varchar(7) NOT NULL,
--     gender varchar(1) NOT NULL,
--     PRIMARY KEY(email)
-- );

-- INSERT INTO registry_lotus (email,firstName,lastName,street,phonenumber,city,postalCode,gender) VALUES
-- ('kasper@lotus.nl','kasper','van den Enden','lotus','+316 12345678', 'Breda','1234AL','M'),
-- ('juliet@lotus.nl','Juliet','van Bezooijen','lotus','+316 12345678','Breda','1234AL','V'),
-- ('daniel@lotus.nl','Daniel','Zuijdam','lotus','+316 12345678','Breda','1234AL','M'),
-- ('jens@lotus.nl','Jens','de Vlaming','lotus','+316 12345678', 'Breda','1234AL','M'),
-- ('new@lotus.nl','New','Testaccount', 'teststraat','+316 99998888','Tilburg','4321LA','O');

--
-- Table structure for table account
--


--
-- Table structure for table client_account
--

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
    companyName varchar(50) NULL,
    roles varchar(25) NOT NULL,
    password varchar(15) DEFAULT "secret",
    PRIMARY KEY(email)
);

-- client users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,companyName,roles) VALUES
('clienta@lotus.nl','Client','A','lotusstreet','1a','+316 12345678', 'Breda','1234AL','M','CLIENTAL B.V.','client'),
('clientb@lotus.nl','Client','B','lotusstreet','2b','+316 12345678', 'tilburg','1234AL','M','CLIENT INC.','client');
-- member users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,companyName,roles) VALUES
('membera@lotus.nl','Member','A','memberstreet','1a','+316 12345678', 'Breda','1234AL','M','CLIENTAL B.V.','member'),
('memberb@lotus.nl','Member','B','memberstreet','2b','+316 12345678', 'tilburg','1234AL','M','CLIENT INC.','member');
-- coord users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles) VALUES
('coord@lotus.nl','Coord','Inator','coordstreet','1a','+316 12345678', 'Breda','1234AL','M','coordinator');


--
-- Table structure for table request
--

/* DROP TABLE IF EXISTS request;
CREATE TABLE request (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    requestName varchar(250) NOT NULL,
    summary varchar(500) NOT NULL,
    comments varchar(500) NULL,
    clientEmail varchar(100) NOT NULL,
    playDate varchar(100) NOT NULL,
    playTime varchar(100) NOT NULl,
    -- playId int NOT NULL AUTO_INCREMENT,
    playStreet varchar(100) NOT NULL,
    playPremise varchar(1) NULL,
    playPCode varchar(7) NOT NULL,
    playProvince varchar(50) NOT NULL,
    playCity varchar(50) NOT NULL,
    -- grimeId int NOT NULL AUTO_INCREMENT,
    grimeStreet varchar(100) NULL DEFAULT playStreet,
    grimePremise varchar(1) NULL DEFAULT playPremise,
    grimePCode varchar(7) NULL DEFAULT playPCode,
    grimeProvince varchar(50) NULL DEFAULT playProvince,
    grimeCity varchar(50) NULL DEFAULT playCity,

    lotusCasualties tinyint NOT NULL,
    approved tinyint NOT NULL DEFAULT 0,
    CreateDate datetime NOT NULL DEFAULT CURRENT_TIMESTAMP     
);
-- request whithout grimeGround with comments
INSERT INTO request (id,requestName,summary,comments,clientEmail,playDate,playTime,playStreet,playPremise,playPCode,playProvince,playCity,lotusCasualties,approved) VALUES
(10,'Amphia ziekenhuis','Steekwonden' ,'Messen en scharen' ,'clienta@lotus.nl' ,'12-6-2022' ,'12:00' ,'Molengracht','25', '4818 CK','Noord-Brabant','Tilburg',10 ,0);
-- request whithout grimeGround without comments
INSERT INTO request (id,requestName,summary,clientEmail,playDate,playTime,playStreet,playPremise,playPCode,playProvince,playCity,lotusCasualties,approved) VALUES
(20,'Huisartsenpraktijd HB','Cuts and bruises','clientb@lotus.nlv'  ,'6-12-2022' ,'10:00' ,'Haagsestraat','10a','1234LA','Noord-Brabant','Breda' ,3 ,1);
-- request with grimeGround with comments
INSERT INTO request (id,requestName,summary,comments,clientEmail,playDate,playTime,playStreet,playPremise,playPCode,playProvince,playCity,grimeStreet,grimePremise,grimePCode,grimeProvince,grimeCity,lotusCasualties,approved) VALUES
(5,'Amphia ziekenhuis','Steekwonden' ,'Messen en scharen','clienta@lotus.nl','12-6-2022' ,'12:00' , 'Molengracht','25', '4818 CK','Noord-Brabant','Tilburg','Molengracht','30', '4818 CK','Noord-Brabant','Tilburg',10 ,0);
-- request with grimeGround without comments
INSERT INTO request (id,requestName,summary,clientEmail,playDate,playTime,playStreet,playPremise,playPCode,playProvince,playCity,grimeStreet,grimePremise,grimePCode,grimeProvince,grimeCity,lotusCasualties,approved) VALUES
(15,'Huisartsenpraktijd HB','Cuts and bruises','clientb@lotus.nlv' ,'6-12-2022' ,'10:00' ,'Haagsestraat','10a','1234LA','Noord-Brabant','Breda','Haagsestraat','15','1234LA','Noord-Brabant','Breda',3 ,1);
 */
--
-- Table structure for table solicit
--

/* DROP TABLE IF EXISTS solicit;
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

  */


DROP TABLE IF EXISTS `lotus`.`account`;
CREATE TABLE `lotus`.`account` (
  `email` varchar(100) NOT NULL,
  `roles` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`account` ADD PRIMARY KEY (`email`,`roles`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`assign`;
CREATE TABLE `lotus`.`assign` (
  `email` varchar(100) NOT NULL,
  `requestId` int(11) NOT NULL,
  `appointed` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`assign` ADD PRIMARY KEY (`email`,`requestId`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`billingaddress`;
CREATE TABLE `lotus`.`billingaddress` (
  `billingAddressId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`billingaddress` ADD PRIMARY KEY (`billingAddressId`);
ALTER TABLE `lotus`.`billingaddress` MODIFY `billingAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2 ;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`client_account`;
CREATE TABLE `lotus`.`client_account` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `pwd` varchar(15) DEFAULT 'secret'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`client_account` ADD PRIMARY KEY (`email`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`company`;
CREATE TABLE `lotus`.`company` (
  `companyId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`company` ADD PRIMARY KEY (`companyId`);
ALTER TABLE `lotus`.`company` MODIFY `companyId` int(11) NOT NULL AUTO_INCREMENT;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`contact`;
CREATE TABLE `lotus`.`contact` (
  `contactId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`contact` ADD PRIMARY KEY (`contactId`);
ALTER TABLE `lotus`.`contact` MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`coord_account`;
CREATE TABLE `lotus`.`coord_account` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `pwd` varchar(15) DEFAULT 'secret'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`coord_account` ADD PRIMARY KEY (`email`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`grimelocation`;
CREATE TABLE `lotus`.`grimelocation` (
  `grimeLocationId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`grimelocation` ADD PRIMARY KEY (`grimeLocationId`);
ALTER TABLE `lotus`.`grimelocation` MODIFY `grimeLocationId` int(11) NOT NULL AUTO_INCREMENT;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`member_account`;
CREATE TABLE `lotus`.`member_account` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `pwd` varchar(15) DEFAULT 'secret'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`member_account` ADD PRIMARY KEY (`email`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`playground`;
CREATE TABLE `lotus`.`playground` (
  `playGroundId` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `postalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`playground` ADD PRIMARY KEY (`playGroundId`);
ALTER TABLE `lotus`.`playground` MODIFY `playGroundId` int(11) NOT NULL AUTO_INCREMENT;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`registry_lotus`;
CREATE TABLE `lotus`.`registry_lotus` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`registry_lotus` ADD PRIMARY KEY (`email`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

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
  `postDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`request` ADD PRIMARY KEY (`requestId`), ADD KEY `FK_billing_request` (`billingAddressId`), ADD KEY `FK_company_request` (`companyId`), ADD KEY `FK_grimelocation_request` (`grimeLocationId`), ADD KEY `FK_playground_request` (`playGroundId`), ADD KEY `FK_contact_request` (`contactId`);
ALTER TABLE `lotus`.`request` MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3 ;

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`solicit`;
CREATE TABLE `lotus`.`solicit` (
  `email` varchar(100) NOT NULL,
  `requestId` int(11) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`solicit` ADD PRIMARY KEY (`email`,`requestId`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `lotus`.`user`;
CREATE TABLE `lotus`.`user` (
  `email` varchar(100) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `premise` varchar(1) DEFAULT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `companyName` varchar(50) DEFAULT NULL,
  `roles` varchar(25) NOT NULL,
  `password` varchar(15) DEFAULT 'secret'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `lotus`.`user` ADD PRIMARY KEY (`email`);

SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';


-- inserts --

INSERT INTO solicit VALUES
('kasper@lotus.nl','1',2),
('juliet@lotus.nl','1',0),
('daniel@lotus.nl','1',1),
('jens@lotus.nl','1',0);


INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,companyName,roles) VALUES
('clienta@lotus.nl','Client','A','lotusstreet','1a','+316 12345678', 'Breda','1234AL','M','CLIENTAL B.V.','client'),
('clientb@lotus.nl','Client','B','lotusstreet','2b','+316 12345678', 'tilburg','1234AL','M','CLIENT INC.','client');
-- member users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,companyName,roles) VALUES
('membera@lotus.nl','Member','A','memberstreet','1a','+316 12345678', 'Breda','1234AL','M','CLIENTAL B.V.','member'),
('memberb@lotus.nl','Member','B','memberstreet','2b','+316 12345678', 'tilburg','1234AL','M','CLIENT INC.','member');
-- coord users
INSERT INTO user (email,firstName,lastName,street,premise,phonenumber,city,postalCode,gender,roles) VALUES
('coord@lotus.nl','Coord','Inator','coordstreet','1a','+316 12345678', 'Breda','1234AL','M','coordinator');