<?php
$user = 'team1'; //the user you have created
$pass = 'team1'; //the user password you have created
$db = 'community'; //the name of the database you want to connect with

$connection = mysqli_connect('localhost', $user, $pass, $db) or die("Unable to connect"); //connect with the database
#die(): it is like to catch if something wrong happpens with the connection and stop the code

date_default_timezone_set("Asia/Kuala_Lumpur");

#you can call this file in other php files, by adding to the other file: include_once("config.php");
    #then you can use the $connnection variable to connect to the database easily.
?>