<?php
include_once('config.php');
session_start();
?>

<?php
$id = $_POST['id'];
$reportstatus = $_POST['reportstatus'];
$lastactivity = $_POST['lastactivity'];
$note = $_POST['note'];
$lastdate = date('Y-m-d', strtotime($_POST['lastdate']));
$lasthour = date('H:i:s', strtotime($_POST['lasthour']));

$stmtCheck = $connection->prepare("SELECT * FROM admin_activity WHERE (ActivityDate = ? AND ActivityHour = ?)");
$stmtCheck->bind_param("ss", $lastdate, $lasthour);
$stmtCheck->execute();
$result = $stmtCheck->get_result();

if (mysqli_num_rows($result) == 0) {
    $stmtUpdate = $connection->prepare("UPDATE cov_report SET ReportStatus = ?, LastActivity = ?, Note = ?, LastActivityDate = ?, LastActivityHour = ? WHERE ReportID = ?");
    $stmtUpdate->bind_param("ssssss", $reportstatus, $lastactivity, $note, $lastdate, $lasthour, $id);
    $stmtUpdate->execute();

    $adminid = $_SESSION['adminid'];
    $activity = $_POST['activity'];

    $stmt = $connection->prepare("INSERT INTO admin_activity(ReportID, admin_id, Activity, ActivityDate, ActivityHour) VALUE (?,?,?,?,?)");
    $stmt->bind_param("sssss", $id, $adminid, $activity, $lastdate, $lasthour);
    $stmt->execute();

    $stmtCheckCase = $connection->prepare("SELECT * FROM active_cases WHERE ReportID = ?");
    $stmtCheckCase->bind_param("s", $id);
    $stmtCheckCase->execute();
    $result = $stmtCheckCase->get_result();

    if ($reportstatus == "In Progress" && mysqli_num_rows($result) == 0) {

        $stmtActive = $connection->prepare("INSERT INTO active_cases(Date, ReportID) VALUE (?,?)");
        $stmtActive->bind_param("ss", $lastdate, $id);
        $stmtActive->execute();

        $stmtActive->close();
    }

    $stmtCheckCase->close();
    $stmtUpdate->close();
    $stmt->close();
}

$stmtCheck->close();
$connection->close();
?>