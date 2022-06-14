<?php
include_once('../assets/php/config.php');
session_start();
?>

<?php
$id = $_POST['id'];
$getinfo = "SELECT resident.name, resident.unit_no, resident.tel_number, cov_report.Description, cov_report.Note, cov_report.ReportStatus, cov_report.LastActivity
FROM resident
INNER JOIN cov_report ON resident.resident_id=cov_report.resident_id WHERE ReportID = '$id'";
$info = mysqli_query($connection, $getinfo);
$infoarr = $info->fetch_assoc();

$connection->close();

echo json_encode($infoarr);
?>