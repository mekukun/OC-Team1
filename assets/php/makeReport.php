<?php
include_once('config.php');
session_start();

$resident_ID =  $_SESSION["userid"];
$lastActivityDate = date("Y-m-d");
$lasthour = date('H:i:s');
$reportStatus = "Pending";
$lastActivity = "Report Submission";
$block = $_POST['block'];
$floorLevel = $_POST['floorLevel'];
$roomNo = $_POST['roomNo'];
$description = $_POST['description'];
$note = "";

$stmt = $connection->prepare("INSERT INTO cov_report (resident_id, LastActivityDate, LastActivityHour, ReportStatus, LastActivity, Block, FloorLevel, unit_no, Description, Note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$stmt->bind_param("isssssisss", $resident_ID, $lastActivityDate, $lasthour, $reportStatus, $lastActivity, $block, $floorLevel, $roomNo, $description, $note);
$stmt->execute();

header("Location: ../../resident/reportcovquarantinestats.php");
