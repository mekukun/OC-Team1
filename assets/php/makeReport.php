<?php
	include_once('config.php');
	session_start();
	
	$resident_ID =  $_SESSION["userid"];
	$lastActivityDate = date("Y-m-d");
	$reportStatus = "Pending";
	$lastActivity = "Waiting for Inspection";
	$block = $_POST['block'];
	$floorLevel = $_POST['floorLevel'];
	$roomNo = $_POST['roomNo'];
	$description = $_POST['description'];
		
	$stmt = $connection->prepare("INSERT INTO cov_report (resident_id, LastActivityDate, ReportStatus, LastActivity, Block, FloorLevel, RoomNo, Description) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	$stmt->bind_param("issssiss",$resident_ID, $lastActivityDate, $reportStatus, $lastActivity, $block, $floorLevel, $roomNo, $description);
	$stmt->execute();
	
	header("Location: ../../resident/reportcovquarantinestats.php");
?>



