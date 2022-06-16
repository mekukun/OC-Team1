<?php
include_once('config.php');
session_start();
?>

<?php
$id = $_POST['id'];

$stmt = $connection->prepare("SELECT resident.name, resident.unit_no, resident.tel_number, cov_report.Description, cov_report.Note, cov_report.ReportStatus, cov_report.LastActivity
FROM resident
INNER JOIN cov_report ON resident.resident_id=cov_report.resident_id WHERE ReportID = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$info = $stmt->get_result(); // get the mysqli result
$infoarr = $info->fetch_assoc(); // fetch data   

$stmt->close();
$connection->close();

echo json_encode($infoarr);
?>