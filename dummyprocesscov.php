<?php
session_start();
include_once('assets\php\config.php');

$userid = $_SESSION['userid'];
$description = $_POST['description'];
$status = $_POST['status'];
$lastactivity = $_POST['lastactivity'];
$lastdate = date("Y-m-d");
$lasthour = date('H:i:s');
$note = $_POST['note'];

$stmt = $connection->prepare("INSERT INTO cov_report(resident_id, Description, LastActivityDate, LastActivityHour, ReportStatus, LastActivity, Note) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss", $userid, $description, $lastdate, $lasthour, $status, $lastactivity, $note);
$stmt->execute();

echo "cov report new added";
