<?php
	include_once('config.php');
	session_start();

	$email = $_POST["email"];
	$password =  $_POST["password"];
	$name = $_POST["name"];
	$tel_number = $_POST["tel_number"];
	$unit_no = $_POST["unit_no"];
	$gender = $_POST["gender"];
	$address =  $_POST["address"];
	$state =  $_POST["state"];
	$photo = $_POST["photo"];


	$stmt = $connection->prepare("UPDATE Resident SET email=?,password=?,name=?,tel_number=?,unit_no=?,gender=?, address=?,state=?, photo=? WHERE resident_id=?");
	$stmt->bind_param("sssssssssi", $email, $password, $name,$tel_number, $unit_no, $gender, $address, $state, $photo, $_SESSION["userid"]);
	$stmt->execute();


	header("Location: ../../resident/profile.php?action=profile_updated");
	
?>