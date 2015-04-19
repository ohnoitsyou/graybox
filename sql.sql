use dayoung1;

DROP TABLE if exists users;
DROP TABLE if exists membership;
DROP TABLE if exists transactions;
DROP TABLE if exists reservations;
DROP TABLE if exists inventory;
DROP TABLE if exists payment_info;
DROP TABLE if exists locations;

CREATE TABLE membership(
userID int NOT NULL AUTO_INCREMENT,
membershipType varchar(5),
startDate TIMESTAMP,
length varchar(10),
PRIMARY KEY (userID)
);

CREATE TABLE inventory(
inventoryID int NOT NULL AUTO_INCREMENT,
iName varchar(20),
iDescription text,
releaseDate date,
serialNumber varchar(15),
price decimal(6,2),
lastLocation varchar(30),
in_out_reserved enum(‘i’,’o’,’r’),
PRIMARY KEY (inventoryID)
);

CREATE TABLE transactions(
transactionID int not null auto_increment,
userID int,
date TIMESTAMP,
statusReturn enum(‘y’,’n’),
card_id int,
inventoryID int,
PRIMARY KEY (transactionID));

CREATE TABLE reservations (
reservationID int not null auto_increment,
userID int,        
inventoryID int, 
locationID int,
PRIMARY KEY (reservationID)
);

CREATE TABLE users ( 
userID int NOT NULL AUTO_INCREMENT,
username VARCHAR(24),
fname VARCHAR(24),
lname VARCHAR(24),
email VARCHAR(35),
pword BINARY(16),  
address VARCHAR(50),
suite VARCHAR(10),
city VARCHAR(20),
state VARCHAR(30),
zip VARCHAR(5),
registration DATE,
PRIMARY KEY (userID)
);

CREATE TABLE payment_info (
card_id int not null auto_increment,
card_owner int,
card_type VARCHAR(20),
card_NUM VARCHAR(16),
card_EXP VARCHAR(5),
card_name VARCHAR(30),
card_ccv VARCHAR(4),
card_zip VARCHAR(5),
primary key(card_id));

CREATE TABLE locations (
locationID int not null auto_increment,
address varchar(100) NOT NULL,
zipcode char(5),
state char(2),
PRIMARY KEY (locationID)
);

