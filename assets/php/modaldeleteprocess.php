<?php
include_once('config.php');
session_start();
if (empty($_SESSION['adminid'])) {
    header("Location: ../../login.php");
}
?>

<?php
$id = $_POST['id'];
$lastdate = date('Y-m-d', strtotime($_POST['lastdate']));
$lasthour = date('H:i:s', strtotime($_POST['lasthour']));

$stmtCheck = $connection->prepare("SELECT * FROM admin_activity WHERE (ActivityDate = ? AND ActivityHour = ?)");
$stmtCheck->bind_param("ss", $lastdate, $lasthour);
$stmtCheck->execute();
$result = $stmtCheck->get_result();

if (mysqli_num_rows($result) == 0) {
    $stmtDelete = $connection->prepare("DELETE FROM cov_report WHERE ReportID = ?");
    $stmtDelete->bind_param("s", $id);
    $stmtDelete->execute();

    $adminid = $_SESSION['adminid'];
    $activity = "Delete report";

    $stmt = $connection->prepare("INSERT INTO admin_activity(ReportID, admin_id, Activity, ActivityDate, ActivityHour) VALUE (?,?,?,?,?)");
    $stmt->bind_param("sssss", $id, $adminid, $activity, $lastdate, $lasthour);
    $stmt->execute();

    $stmtDelete->close();
    $stmt->close();
}

$stmtCheck->close();
$connection->close();
?>
