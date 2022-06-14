<?php
include_once('../assets/php/config.php');
session_start();
?>

<?php
$id = $_POST['id'];
$reportstatus = $_POST['reportstatus'];
$lastactivity = $_POST['lastactivity'];
$note = $_POST['note'];
$lastdate = date("Y-m-d");
$lasthour = date('H:i:s');
$sql = "UPDATE cov_report SET ReportStatus = '$reportstatus', LastActivity = '$lastactivity', Note = '$note', LastActivityDate = '$lastdate', LastActivityHour = '$lasthour' WHERE ReportID = '$id'";
$result = mysqli_query($connection, $sql);

$adminid = $_SESSION['adminid'];
$activity = $_POST['activity'];
$stmt = $connection->prepare("INSERT INTO admin_activity(ReportID, admin_id, Activity, ActivityDate, ActivityHour) VALUE (?,?,?,?,?)");
$stmt->bind_param("sssss", $id, $adminid, $activity, $lastdate, $lasthour);
$stmt->execute();

$stmt->close();
$connection->close();
?>