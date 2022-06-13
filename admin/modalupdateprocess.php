<?php
include_once('../assets/php/config.php');
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
?>