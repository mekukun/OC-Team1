<?php
include_once("config.php");

session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$type = $_POST["userType"]; //resident || admin

if ($type == "admin") { //go to admin table
    $result = mysqli_query($connection, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($result) != 0) { //email and password correct
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        header("Location:../../admin/profileadmin.html");
    } else {
        header("location:../../login.php?msg=failed");
        die();
    }
} else { //go to resident table
    $result = mysqli_query($connection, "SELECT * FROM resident  WHERE email='$email' AND password='$password'");
    if (mysqli_num_rows($result) != 0) { //email and password correct
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $password;
        $result = mysqli_query($connection, "SELECT resident_id FROM resident WHERE email='$email' AND password='$password'");

        while ($res = $result->fetch_assoc()) {
            $userid = $res["resident_id"];
            $_SESSION["userid"] = $userid;
        }

        header("Location: ../../resident/profile.html?msg=$userid");
    } else {
        header("location:../../login.php?msg=failed");
        die();
    }
}