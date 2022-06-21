<?php
	include_once('config.php');
	session_start();

	$email = $_POST["email"];
	$password =  $_POST["password"];
	$name = $_POST["name"];
	$tel_number = $_POST["tel_number"];
	$unit_no = $_POST["unit_no"];
	$gender = $_POST["gender"];
	$level =  $_POST["level"];
	$block =  $_POST["block"];
	$photo = $_POST["photo"];


	$stmt = $connection->prepare("UPDATE Resident SET email=?,password=?,name=?,tel_number=?,unit_no=?,gender=?, level=?,block=?, photo=? WHERE resident_id=?");
	$stmt->bind_param("ssssssissi", $email, $password, $name,$tel_number, $unit_no, $gender, $level, $block, $photo, $_SESSION["userid"]);
	$stmt->execute();

	header("Location: ../../resident/profile.php?action=profile_updated");
	
?>
