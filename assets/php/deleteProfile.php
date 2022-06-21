<?php
include_once("config.php");

$user_id = $_GET["userid"];

//delete query
mysqli_query($connection, "DELETE FROM Resident WHERE resident_id = '" . $_SESSION["userid"] . "'");
header("Location: ../../login.php?action=account_deleted");
mysqli_close($connection);

?>
