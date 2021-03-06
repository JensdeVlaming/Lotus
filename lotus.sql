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

DROP TABLE IF EXISTS `solicit`;
DROP TABLE IF EXISTS `request`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `role`;
DROP TABLE IF EXISTS `grimelocation`;
DROP TABLE IF EXISTS `playground`;
DROP TABLE IF EXISTS `billingaddress`;
DROP TABLE IF EXISTS `contact`;
DROP TABLE IF EXISTS `company`;

    -- role
    CREATE TABLE `role` (
        `id` int AUTO_INCREMENT,
        `name` varchar(16) NOT NULL,
        PRIMARY KEY(id)
    );

-- company
CREATE TABLE `company` (
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


-- billingaddress
CREATE TABLE `billingaddress` (
    `billingAddressId` int(11) NOT NULL AUTO_INCREMENT,
    `bEmail` varchar(200) NOT NULL,
    `bCountry` varchar(200) NOT NULL,
    `bProvince` varchar(200) NOT NULL,
    `bCity` varchar(200) NOT NULL,
    `bStreet` varchar(200) NOT NULL,
    `bHouseNumber` varchar(10) NOT NULL,
    `bPostalCode` varchar(10) NOT NULL,
    PRIMARY KEY (billingAddressId)
);

-- user
CREATE TABLE `user` (
    `email` varchar(100) NOT NULL,
    `firstName` varchar(50) NOT NULL,
    `lastName` varchar(50) NOT NULL,
    `street` varchar(100) NULL,
    `premise` varchar(5) NULL,
    `phoneNumber` varchar(15) NOT NULL,
    `city` varchar(50) NULL,
    `postalCode` varchar(7) NULL,
    `gender` varchar(1) NULL,
    `roles` int NOT NULL DEFAULT 1,
    `password` varchar(15) NOT NULL,
    `companyId` int NULL,
    `billingAddressId` int NULL,
    PRIMARY KEY(email),
    CONSTRAINT FK_UserRoles FOREIGN KEY (roles) REFERENCES `role`(id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_UserBillingaddress FOREIGN KEY (billingAddressId) REFERENCES `billingaddress`(billingAddressId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_UserCompany FOREIGN KEY (companyId) REFERENCES `company`(companyId) ON UPDATE CASCADE ON DELETE CASCADE
);

-- contact
CREATE TABLE `contact` (
    `contactId` int(11) NOT NULL AUTO_INCREMENT,
    `firstName` varchar(200) NOT NULL,
    `lastName` varchar(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    `phoneNumber` varchar(15) NOT NULL,
    PRIMARY KEY(contactId)
);

    -- grimelocation
    CREATE TABLE `grimelocation` (
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
    CREATE TABLE `playground` (
        `playGroundId` int(11) NOT NULL AUTO_INCREMENT,
        `pCountry` varchar(200) NOT NULL,
        `pProvince` varchar(200) NOT NULL,
        `pCity` varchar(200) NOT NULL,
        `pStreet` varchar(200) NOT NULL,
        `pHouseNumber` varchar(10) NOT NULL,
        `pPostalCode` varchar(10) NOT NULL,
        PRIMARY KEY(playGroundId)

    );

-- request
CREATE TABLE `request` (
    `requestId` int NOT NULL AUTO_INCREMENT,
    `description` text NOT NULL,
    `comments` text DEFAULT NULL,
    `date` varchar(10) NOT NULL,
    `time` varchar(5) NOT NULL,
    `endTime` varchar(5) NOT NULL,
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
    CONSTRAINT FK_RequestBillingaddress FOREIGN KEY (billingAddressId) REFERENCES `billingaddress`(billingAddressId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestCompany FOREIGN KEY (companyId) REFERENCES `company`(companyId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestContact FOREIGN KEY (contactId) REFERENCES `contact`(contactId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestGrimelocation FOREIGN KEY (grimeLocationId) REFERENCES `grimelocation`(grimeLocationId) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT FK_RequestPlaygroundt FOREIGN KEY (playGroundId) REFERENCES `playground`(playGroundId) ON UPDATE CASCADE ON DELETE CASCADE
);

    -- solicit
    CREATE TABLE `solicit` (
        `email` varchar(100) NOT NULL,
        `requestId` int NOT NULL,
        `assigned` tinyint NOT NULL DEFAULT 0,
        `deregisterReason` varchar(100),
        PRIMARY KEY (email, requestId),
        CONSTRAINT FK_SolicitUser FOREIGN KEY (email) REFERENCES `user`(email) ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT FK_SolicitRequest FOREIGN KEY (requestId) REFERENCES `request`(requestId) ON UPDATE CASCADE ON DELETE CASCADE
    );

    -- roles
    INSERT INTO `role` (id, name) VALUES
    (1,'Lid'),
    (2,'Coordinator'),
    (3,'Opdrachtgever'),
    (4,'Coordinator,Lid');

-- billingaddress
INSERT INTO `billingaddress` (billingAddressId, bCountry, bEmail, bProvince, bCity, bStreet, bHouseNumber, bPostalCode) VALUES 
(1, 'Nederland', 'contact@gmail.com', 'Noord-Brabant', 'Breda', 'Hooghout', 65, '4817 EA'),
(2, 'Nederland', 'contact@gmail.com', 'Gelderland', 'Nijmegen', 'Jasmijnstraat', 28, '6543 TW'),
(3, 'Nederland', 'contact@gmail.com', 'Zuid-Holland', 'Dordrecht', 'Halmaheiraplein', 5, '3312 GH'),
(4, 'Nederland', 'contact@gmail.com', 'Noord-Holland', 'Amsterdam', 'Anjeliersstraat', 187, '1015 NG'),
(5, 'Nederland', 'contact@gmail.com', 'Utrecht', 'Utrecht', 'Van Diemenstraat', 33, '3531 GG');

    -- company
    INSERT INTO `company` (companyId, cCountry, cProvince, cCity, cStreet, cHouseNumber, cPostalCode, companyName) VALUES 
    (1, 'Nederland', 'Noord-Brabant', 'Breda', 'Hooghout', 65, '4817 EA', 'Apotheek Brabantpark'),
    (2, 'Nederland', 'Gelderland', 'Nijmegen', 'Jasmijnstraat', 28, '6543 TW', 'Amphia Ziekenhuis Langendijk'),
    (3, 'Nederland', 'Zuid-Holland', 'Dordrecht', 'Halmaheiraplein', 5, '3312 GH', 'Apotheek Brabantpark'),
    (4, 'Nederland', 'Noord-Holland', 'Amsterdam', 'Anjeliersstraat', 187, '1015 NG', 'Amphia Ziekenhuis Langendijk'),
    (5, 'Nederland', 'Utrecht', 'Utrecht', 'Van Diemenstraat', 33, '3531 GG', 'Amphia Ziekenhuis Molengracht');

-- users
INSERT INTO `user` (email, firstName, lastName, street, premise, phonenumber, city, postalCode, gender, roles, password) VALUES
('manuelasmarius@lotus.nl','Manuela','Smarius','lotusstreet','1a','+316 12345678', 'Breda','1234AL','V', 4, 'Manuela01'),
('manuelasmarius-opdrachtgever@lotus.nl','Manuela','Smarius','lotusstreet','1a','+316 12345678', 'Breda','1234AL','V', 3, 'Manuela01'),
('member@lotus.nl','Piet','Lid','memberstreet','1a','+316 12345678', 'Breda','1234AL','M', 1, 'secret'),
('coordinator@lotus.nl','Paula','Coordinator','coordstreet','1a','+316 12345678', 'Breda','1234AL','M', 4, 'secret'),
('jens@lotus.nl','Jens','de Vlaming','Burgemeester Beelaertspark','12','06 20529433', 'Dordrecht','3319AV','M', 1, 'secret'),
('daniel@lotus.nl','Daniel','Zuijdam', 'Lotusstraat', '1', '06 12345678', 'Breda', '000AX', 'V', 1, 'secret'),
('kasper@lotus.nl','Kasper','van den Enden', 'Lotusstraat', '1', '06 12345678', 'Breda', '000AX', 'V', 1, 'secret'),
('juliet@lotus.nl', 'Juliet', 'van Bezooijen', 'Papenhof', '16', '06 36548857', 'Breda', '4817BX', 'V', 1, 'secret');

INSERT INTO `user` (email, firstName, lastName, street, premise, phonenumber, city, postalCode, gender, roles, password, companyId, billingAddressId) VALUES
('client@lotus.nl','Klaas','Opdrachtgever','lotusstreet','1a','+316 12345678', 'Breda','1234AL','M', 3, 'secret', 1, 1);

-- contact
INSERT INTO `contact` (contactId, firstName, lastName, email, phoneNumber) VALUES 
(1, 'Jan', 'Jansen', 'janjansen@gmail.com', '06-12345678'),
(2, 'Betty', 'Bezem', 'bettybezem@gmail.com', '06-12345678'),
(3, 'Mirte', 'Roos', 'mirteroos@gmail.com', '06-12345678'),
(4, 'Fien', 'Brechtje', 'fienbrechtje@gmail.com', '06-12345678'),
(5, 'Loek', 'Alice', 'loekalice@gmail.com', '06-12345678');

    -- grimelocation
    INSERT INTO `grimelocation` (grimeLocationId, gCountry, gProvince, gCity, gStreet, gHouseNumber, gPostalCode) VALUES 
    (1, 'Nederland', 'Noord-Brabant', 'Breda', 'Hooghout', 65, '4817 EA'),
    (2, 'Nederland', 'Gelderland', 'Nijmegen', 'Jasmijnstraat', 28, '6543 TW'),
    (3, 'Nederland', 'Zuid-Holland', 'Dordrecht', 'Halmaheiraplein', 5, '3312 GH'),
    (4, 'Nederland', 'Noord-Holland', 'Amsterdam', 'Anjeliersstraat', 195, '1015 NG'),
    (5, 'Nederland', 'Utrecht', 'Utrecht', 'Van Diemenstraat', 25, '3531 GG');

    -- playground
    INSERT INTO `playground` (playGroundId, pCountry, pProvince, pCity, pStreet, pHouseNumber, pPostalCode) VALUES 
    (1, 'Nederland', 'Noord-Brabant', 'Breda', 'Hooghout', 65, '4817 EA'),
    (2, 'Nederland', 'Gelderland', 'Nijmegen', 'Jasmijnstraat', 28, '6543 TW'),
    (3, 'Nederland', 'Zuid-Holland', 'Dordrecht', 'Halmaheiraplein', 5, '3312 GH'),
    (4, 'Nederland', 'Noord-Holland', 'Amsterdam', 'Anjeliersstraat', 187, '1015 NG'),
    (5, 'Nederland', 'Utrecht', 'Utrecht', 'Van Diemenstraat', 33, '3531 GG');


    -- request
    INSERT INTO `request` (requestId, description, comments, date, time, endTime, clientEmail, casualties, playGroundId, grimeLocationId, companyId, contactId, billingAddressId, approved) VALUES 
    (1, 'Steekwonden', 'Cuts and bruises', '2022-06-12', '10:00','14:00' , 'client@lotus.nl', 5, 1, 1, 1, 1, 1, 0),
    (2, 'Benauwdheid', 'Paars gezicht', '2022-06-14', '12:00','16:00' ,'client@lotus.nl', 3, 2, 2, 2, 2, 2, 1),
    (3, 'Brandoefening', 'Hoofdpijn', '2022-06-14', '12:00','16:00' ,'client@lotus.nl', 10, 3, 3, 3, 3, 3, 2),
    (4, 'Aanrijding', 'Slachtoffer na aanrijding bewusteloos','2022-07-05', '13:00', '17:00','client@lotus.nl', 2, 4, 4, 4, 4, 4, 3),
    (5, 'Kneuzing', 'Voet', '2022-08-20', '10:00','14:00' ,'client@lotus.nl', 1, 5, 5, 5, 5, 5, 4);

    -- solicit
    INSERT INTO `solicit` (email, requestId, assigned) VALUES
    ('kasper@lotus.nl', 2, 0),
    ('juliet@lotus.nl', 2, 1),
    ('daniel@lotus.nl', 2, 2),
    ('jens@lotus.nl', 2, 3),
    ('member@lotus.nl', 2, 1),
    ('kasper@lotus.nl', 3, 0),
    ('juliet@lotus.nl', 3, 1),
    ('daniel@lotus.nl', 3, 2),
    ('jens@lotus.nl', 3, 3),
    ('member@lotus.nl', 3, 2),
    ('kasper@lotus.nl', 4, 0),
    ('juliet@lotus.nl', 4, 1),
    ('daniel@lotus.nl', 4, 2),
    ('jens@lotus.nl', 4, 3),
    ('member@lotus.nl', 4, 3),
    ('kasper@lotus.nl', 5, 0),
    ('juliet@lotus.nl', 5, 1),
    ('daniel@lotus.nl', 5, 2),
    ('jens@lotus.nl', 5, 3),
    ('member@lotus.nl', 5, 1);
