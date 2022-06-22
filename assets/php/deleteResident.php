<?php
include_once("config.php");

$user_id = $_GET['user_id'];
//delete query
mysqli_query($connection, "DELETE FROM resident WHERE resident_id = $user_id");
header("Location: ../../admin/manageResidents.php?action=resident_deleted");
mysqli_close($connection);
?>