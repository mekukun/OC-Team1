CREATE DATABASE community;

USE community;

CREATE TABLE `Resident` (
	`resident_id` INT NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`password` varchar(25) NOT NULL,
	`name` varchar(50) NOT NULL,
	`tel_number` varchar(25),
	`address` varchar(255),
	`postcode` INT(25),
	`state` varchar(25),
	PRIMARY KEY (`resident_id`)
);

CREATE TABLE `Admin` (
	`admin_id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(25) NOT NULL UNIQUE,
	`password` varchar(25) NOT NULL,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`admin_id`)
);

CREATE TABLE `COV_REPORT` (
	`ReportID` INT NOT NULL AUTO_INCREMENT,
	`LastActivityDate` DATE NOT NULL,
	`ReportStatus` VARCHAR(255) NOT NULL,
	`LastActivity` VARCHAR(255) NOT NULL,
	`RoomNo` VARCHAR(255) NOT NULL,
	`Note` VARCHAR(255),
	PRIMARY KEY (`ReportID`)
);

CREATE TABLE `ACTIVE_CASES` (
	`CaseID` INT NOT NULL AUTO_INCREMENT,
	`Date` DATE NOT NULL,
	`ReportID` INT NOT NULL,
	PRIMARY KEY (`CaseID`)
);

CREATE TABLE `visitor_information` (
	`User_ID` INT NOT NULL AUTO_INCREMENT,
	`FirstName` VARCHAR(255) NOT NULL,
	`LastName` VARCHAR(255) NOT NULL,
	`City` VARCHAR(255),
	`Province` VARCHAR(255),
	`MobileNumber` VARCHAR(255),
	`HomeNumber` VARCHAR(255),
	`Email` VARCHAR(255) NOT NULL,
	`Booking_ID` INT NOT NULL,
	PRIMARY KEY (`User_ID`)
);

CREATE TABLE `Booking_details` (
	`Booking_ID` INT NOT NULL AUTO_INCREMENT,
	`VisitingDate` DATE NOT NULL,
	`CarNumber` VARCHAR(255),
	`UnitNumber` INT NOT NULL,
	`Number_of_Adults_Guests` INT NOT NULL,
	PRIMARY KEY (`Booking_ID`)
);

ALTER TABLE `ACTIVE_CASES` ADD FOREIGN KEY (`ReportID`) REFERENCES `COV_REPORT`(`ReportID`);

ALTER TABLE `visitor_information` ADD FOREIGN KEY (`Booking_ID`) REFERENCES `Booking_details`(`Booking_ID`);