CREATE DATABASE community;

USE community;

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tel_number` varchar(25) DEFAULT NULL,
  `unit_no` varchar(255) DEFAULT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `block` varchar(50) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`resident_id`),
  UNIQUE KEY `email` (`email`)
);

CREATE TABLE `Admin` (
	`admin_id` INT NOT NULL AUTO_INCREMENT,
	`email` varchar(25) NOT NULL UNIQUE,
	`password` varchar(25) NOT NULL,
	`name` varchar(50) NOT NULL,
	PRIMARY KEY (`admin_id`)
);

CREATE TABLE `cov_report` (
  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
  `resident_id` int(11) NOT NULL,
  `DateCreated` date NOT NULL DEFAULT current_timestamp(),
  `Description` varchar(255) NOT NULL,
  `LastActivityDate` date NOT NULL,
  `LastActivityHour` time NOT NULL,
  `ReportStatus` varchar(255) NOT NULL,
  `LastActivity` varchar(255) NOT NULL,
  `Block` varchar(5) NOT NULL,
  `FloorLevel` int(5) NOT NULL,
  `unit_no` varchar(255) NOT NULL,
  `Note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ReportID`)
);

CREATE TABLE `ADMIN_ACTIVITY` (
	`AdminActivityID` INT NOT NULL AUTO_INCREMENT,
	`ReportID` INT NOT NULL,
	`admin_id` INT NOT NULL,
	`Activity` VARCHAR(255) NOT NULL,
	`ActivityDate` DATE NOT NULL,
	`ActivityHour` TIME NOT NULL,
	PRIMARY KEY (`AdminActivityID`),
	FOREIGN KEY (`admin_id`) REFERENCES `Admin`(`admin_id`)
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

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
);

CREATE TABLE `grocery` (
  `grocery_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`grocery_id`)
);

CREATE TABLE `medical` (
  `medical_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`medical_id`)
);

ALTER TABLE `Booking_details` ADD FOREIGN KEY (`Booking_ID`) REFERENCES `visitor_information`(`User_ID`);

-- initial data for managecovreport.php testing

-- cov_report table
INSERT INTO `cov_report` (`ReportID`, `resident_id`, `DateCreated`, `Description`, `LastActivityDate`, `LastActivityHour`, `ReportStatus`, `LastActivity`, `Block`, `FloorLevel`, `unit_no`, `Note`) VALUES
(1, 1, '2022-05-21', 'I have cov-19', '2022-05-21', '09:08:20', 'Completed', 'Report Closed', 'A', 1, 'A123', ''),
(2, 1, '2022-06-21', 'I have cov-19', '2022-06-21', '01:11:18', 'Completed', 'Report Closed', 'B', 1, 'B123', ''),
(3, 1, '2022-06-21', 'I have cov-19', '2022-06-21', '09:06:34', 'Pending', 'Report Submission', 'C', 1, 'C123', ''),
(4, 1, '2022-06-22', 'I have cov-19', '2022-06-22', '09:06:38', 'Pending', 'Report Submission', 'D', 1, 'D123', ''),
(5, 1, '2022-06-22', 'I have cov-19', '2022-06-22', '09:06:44', 'Pending', 'Report Submission', 'A', 2, 'A234', ''),
(6, 1, '2022-06-22', 'I have cov-19', '2022-06-22', '09:06:53', 'Pending', 'Report Submission', 'B', 2, 'B234', ''),
(7, 1, '2022-06-22', 'I have cov-19', '2022-06-22', '09:07:04', 'Pending', 'Report Submission', 'C', 2, 'C234', '');

-- admin_activity table
INSERT INTO `admin_activity` (`AdminActivityID`, `ReportID`, `admin_id`, `Activity`, `ActivityDate`, `ActivityHour`) VALUES
(1, 1, 1, 'Complete report', '2022-05-21', '09:08:20'),
(2, 2, 1, 'Complete report', '2022-06-21', '09:11:18');

-- active_cases table
INSERT INTO `active_cases` (`CaseID`, `Date`, `ReportID`) VALUES
(1, '2022-06-21', 1),
(2, '2022-06-21', 2);
