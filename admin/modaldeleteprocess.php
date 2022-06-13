<?php
include_once('../assets/php/config.php');
?>

<?php
$id = $_POST['id'];
$sql = "DELETE FROM cov_report WHERE ReportID = '$id'";
$result = mysqli_query($connection, $sql);
?>
