<?php
session_start();
include_once('assets\php\config.php');

$userid = $_SESSION['userid'];
$description = $_POST['description'];
$status = $_POST['status'];
$lastactivity = $_POST['lastactivity'];
$date = getdate(date("U"));
$lastdate = "$date[mday] $date[month] $date[year]";
$note = $_POST['note'];

$stmt = $connection->prepare("INSERT INTO cov_report(resident_id, Description, LastActivityDate, ReportStatus, LastActivity, Note) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("ssssss", $userid, $description, $lastdate, $status, $lastactivity, $note);
$stmt->execute();

echo "cov report new added";
