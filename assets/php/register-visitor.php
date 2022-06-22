<?php
$conn = include_once('config.php');
session_start();

$FirstName = $_POST["Firstname"];
$LastName = $_POST["Lastname"];
$City = $_POST["City"];
$Province = $_POST["Province"];
$MobileNumber = $_POST["MobileNumber"];
$HomeNumber = $_POST["HomeNumber"];
$Email = $_POST["Email"];

$VisitingDate = $_POST["VisitingDate"];
$CarNumber = $_POST["CarNumber"];
$UnitNumber = $_POST["UnitNumber"];
$Number_of_Adults_Guests = filter_input(INPUT_POST, "Number_of_Adults_Guests", FILTER_VALIDATE_INT);





//mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_error()) {
    die("Connection error: " . mysqli_connect_error());
}

$stmt1 = $connection->prepare("INSERT INTO visitor_information (Firstname, Lastname, City, Province, MobileNumber, HomeNumber, Email) 
VALUES (?, ?, ?, ?, ?, ?, ?);");
$stmt1->bind_param("sssssss", $FirstName, $LastName, $City, $Province, $MobileNumber, $HomeNumber, $Email);
$stmt1->execute();

$stmt = $connection->prepare("INSERT INTO booking_details (VisitingDate, CarNumber, UnitNumber, Number_of_Adults_Guests) 
VALUES (?, ?, ?, ?);");
$stmt->bind_param("ssii", $VisitingDate, $CarNumber, $UnitNumber, $Number_of_Adults_Guests);
$stmt->execute();

header("Location:../../resident/profile.php");
