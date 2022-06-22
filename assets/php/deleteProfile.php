<?php
include_once("config.php");
session_start();
if (empty($_SESSION['userid'])) {
    header("Location: ../login.php");
}

//delete query
mysqli_query($connection, "DELETE FROM Resident WHERE resident_id = '" . $_SESSION["userid"] . "'");
header("Location: logout.php");
mysqli_close($connection);
