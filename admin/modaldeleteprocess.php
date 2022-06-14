<?php
include_once('../assets/php/config.php');
session_start();
?>

<?php
$id = $_POST['id'];
$sql = "DELETE FROM cov_report WHERE ReportID = '$id'";
$result = mysqli_query($connection, $sql);

$adminid = $_SESSION['adminid'];
$activity = "Delete report";
$lastdate = date("Y-m-d");
$lasthour = date('H:i:s');

$stmt = $connection->prepare("INSERT INTO admin_activity(ReportID, admin_id, Activity, ActivityDate, ActivityHour) VALUE (?,?,?,?,?)");
$stmt->bind_param("sssss", $id, $adminid, $activity, $lastdate, $lasthour);
$stmt->execute();

$stmt->close();
$connection->close();
?>
