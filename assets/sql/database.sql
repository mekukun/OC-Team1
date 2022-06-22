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
  `startQuarantine` date DEFAULT NULL,
  `endQuarantine` date DEFAULT NULL,
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
	`UnitNumber` VARCHAR(255) NOT NULL,
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
INSERT INTO `cov_report` (`ReportID`, `resident_id`, `DateCreated`, `Description`, `LastActivityDate`, `LastActivityHour`, `ReportStatus`, `LastActivity`, `Block`, `FloorLevel`, `unit_no`, `Note`, `startQuarantine`, `endQuarantine`) VALUES
(1, 1, '2022-06-20', 'First case of the week', '2022-06-20', '00:00:00', 'Completed', 'Report Closed', 'A', 4, 'A411', 'Patient has recovered', '2022-06-20', '2022-06-25'),
(2, 1, '2022-06-21', 'No description', '2022-06-22', '00:00:00', 'Completed', 'Report Closed', 'B', 2, 'A209', 'Patient is allergic to peanut', '2022-06-21', '2022-06-26'),
(3, 1, '2022-06-22', 'No description', '2022-06-20', '00:00:00', 'In Progress', 'Report Validation', 'C', 3, 'C301', 'No note', '2022-06-22', '2022-06-27'),
(4, 1, '2022-06-21', 'Patient is waiting for evacuation', '2022-06-21', '00:00:00', 'In Progress', 'Report Validation', 'D', 1, 'D104', 'Need to provide extra medication', '2022-06-21', '2022-06-26'),
(5, 1, '2022-06-17', 'No description', '2022-06-16', '00:00:00', 'Pending', 'Report Submission', 'B', 1, 'B106', 'No note', '2022-06-17', '2022-06-22'),
(6, 1, '2022-06-20', 'Patient is having mild symptoms and requiring immediate attention', '2022-06-22', '00:00:00', 'Completed', 'Report Closed', 'C', 4, 'C421', 'No note', '2022-06-20', '2022-06-20'),
(7, 1, '2022-06-17', 'Help', '2022-06-17', '00:00:00', 'Pending', 'Report Submission', 'A', 4, 'A411', "", '2022-06-17', '2022-06-22'),
(8, 1, '2022-06-17', 'Help fast', '2022-06-17', '00:00:00', 'Pending', 'Report Submission', 'B', 2, 'B201', "", '2022-06-17', '2022-06-22'),
(9, 1, '2022-06-17', 'Help fast', '2022-06-17', '00:00:00', 'Pending', 'Report Submission', 'C', 1, 'C111', "", '2022-06-17', '2022-06-22'),
(10, 1, '2022-06-17', 'Test', '2022-06-17', '00:00:00', 'Pending', 'Report Submission', 'D', 2, 'A203', "", '2022-06-22', '2022-06-27'),
(11, 1, '2022-06-22', 'New case', '2022-06-22', '14:05:46', 'Pending', 'Report Submission', 'A', 1, 'A99', "", '2022-06-22', '2022-06-30');

-- admin table
INSERT INTO `admin` (`email`,`password`,`name`) VALUES ('m@gmail.com','M@tt3000','majd'), ('j@gmail.com','J@tt3000','Jal');

-- resident table
INSERT INTO `resident` (`email`,`password`,`name`,`tel_number`,`unit_no`,`gender`,`block`,`level`) VALUES 
('r@gmail.com','R@tt3000','ror','011111','5','male','4','2'), 
('lal@gmail.com','L@tt3000','lal','011122','6','female','6','3');

-- admin_activity table
INSERT INTO `admin_activity` (`AdminActivityID`, `ReportID`, `admin_id`, `Activity`, `ActivityDate`, `ActivityHour`) VALUES
(1, 1, 1, 'Complete report', '2022-05-21', '09:08:20'),
(2, 2, 1, 'Complete report', '2022-06-21', '09:11:18');

-- active_cases table
INSERT INTO `active_cases` (`CaseID`, `Date`, `ReportID`) VALUES
(1, '2022-06-21', 1),
(2, '2022-06-21', 2);

-- facility (restaurant)
INSERT INTO `restaurant`(`name`, `description`, `contact`, `address`) VALUES ('McDonalds','McDonalds is an American multinational fast food corporation, founded in 1940 as a restaurant operated by Richard and Maurice McDonald, in San Bernardino, California, United States. Now it has branches in all over the world. Kuala Lumpur also got many McDonalds in many sectors of the city.','+603 – 9057 3308','2, Jalan 14/4, Seksyen 14, 46400 Petaling Jaya, Selangor');
INSERT INTO `restaurant`(`name`, `description`, `contact`, `address`) VALUES ('Dominos','Dominos Pizza started with just one store called "DomiNicks" bought by brothers Tom and James Monaghan for $500 in 1960. James traded his half of the business to Tom in 1965, and as sole owner Tom renamed the business Dominos Pizza Inc. In 1978 the 200th Dominos store opened, and things really began to cook. By 1983 there were 1,000 Dominos stores, and in the same year Dominos opened its first international store in Winnipeg, Canada, followed by its first store on the Australasian continent.','1300-888-333','23, Jalan 14/20, Seksyen 14, 46100 Petaling Jaya, Selangor.');
INSERT INTO `restaurant`(`name`, `description`, `contact`, `address`) VALUES ('KFC','KFC (Kentucky Fried Chicken) is an American fast food restaurant chain headquartered in Louisville, Kentucky that specializes in fried chicken. It is the worlds second largest restaurant chain (as measured by sales) after McDonalds, with 22,621 locations globally in 150 countries. KFC was founded by Colonel Harland Sanders, an entrepreneur who began selling fried chicken from his roadside restaurant in Corbin, Kentucky during the Great Depression.','03-7865 3701','2, Jln 21/19, Sea Park,46300 Petaling Jaya, Selangor.');

-- facility (medical)
INSERT INTO `medical`(`name`, `description`, `contact`, `address`) VALUES ('Subang Jaya Medical Centre','Subang Jaya Medical Centre (SJMC) is the flagship hospital of Ramsay Sime Darby Health Care, a joint venture between Ramsay Health Care, Australia and Sime Darby, Malaysia. It is a 444-bed multi-disciplinary and tertiary care private hospital located in the bustling subarban township of Subang Jaya, about 30 minute drive to Kuala Lumpur city centre and the Kuala Lumpur International Airport (KLIA) via major highways. The Emergency Department is a 24 hours center that caters for all emergencies.','+603 5639 1212','Jalan SS 12/1A, 47500 Subang Jaya, Selangor, Malaysia');
INSERT INTO `medical`(`name`, `description`, `contact`, `address`) VALUES ('KPJ Damansara Specialist Hospital','We are committed to serving our patients with compassion and high quality care, offering a comprehensive range of medical services, which include world-class facilities and advanced medical technologies. We provide the fastest aid service accross the whole Malaysia. Making sure better patient health is our main goal.','03-7718 1000','119, Jalan SS 20/10, Damansara Utama, 47400 Petaling Jaya, Selangor');

-- facility (grocery)
INSERT INTO `grocery`(`name`, `description`, `contact`, `address`) VALUES ('99 Speedmart','99 Speedmart® is a rapidly growing chain of refreshing mini-markets (mini supermarkets) that meets multiracial consumer’s needs for groceries and services, offering unbeatable value and absolute convenience! Our name is a promise to our customers that we will strive for perfection and efficiency, ensuring that our customers can shop in an environment that is accessible and welcoming.','603 3362 6863','Beside Jaya one, Jalan 17/2 Petaling Jaya Selangor, 46400 Kuala Lumpur, Malaysia.');
INSERT INTO `grocery`(`name`, `description`, `contact`, `address`) VALUES ('7-Eleven','7-Eleven Malaysia Holdings Berhad through its subsidiary 7-Eleven Malaysia Sdn Bhd is the owner and operator of 7-Eleven stores in Malaysia. Incorporated on 4 June 1984, 7-Eleven Malaysia has made its mark in the retailing scene and has been a prominent icon for over 28 years.7-Eleven Malaysia is the single largest convenience store chain with more than 2,400 stores nationwide, serving over 900,000 customers daily.','03-2142 1136','Beside Jaya one, Jalan 17/2 Petaling Jaya Selangor, 46400 Kuala Lumpur, Malaysia.');
INSERT INTO `grocery`(`name`, `description`, `contact`, `address`) VALUES ('KK Supermart','KK SUPER MART is the flagship business of the Group. KK SUPER MART is a one-stop convenience chain store that is well-loved by the locals. Throughout 21 years of serving our customers, it has expanded exponentially to more than 579 outlets located mainly in Selangor, Kuala Lumpur, Putrajaya, Melaka, Negeri Sembilan, Johor, Pahang and Sarawak. Our goal is to achieve 1,000 outlets with the desire of becoming a household name throughout Malaysia and beyond the shores.','+603 – 9057 3308','Beside Jaya one, Jalan 17/2 Petaling Jaya Selangor, 46400 Kuala Lumpur, Malaysia.');
