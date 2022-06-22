<?php 
include_once("config.php");

$user_id = $_POST["user_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$tel_number = $_POST["tel_number"];
$block = $_POST["block"];
$level = $_POST["level"];
$unit_no = $_POST["unit_no"];

if(empty($name) || empty($email)){
    if (empty($name)) {
        header("Location: ../../admin/editResidentDetails.php?user_id=$user_id&action=empty_name");
    }
    if (empty($email)) {
        header("Location: ../../admin/editResidentDetails.php?user_id=$user_id&action=empty_email");
    }
} else {
    //check email has edited
    $result2 = mysqli_query($connection, "SELECT email FROM resident WHERE resident_id = $user_id");
    $res2 = mysqli_fetch_array($result2);
    $currentEmail = $res2["email"];
    if($currentEmail != $email){
        //check email existed
        $result1 = mysqli_query($connection, "SELECT email FROM resident");
        $emailExist = false;
        while ($res = mysqli_fetch_array($result1)) {
            if ($res['email'] == $email) {
                $emailExist = true;
                break;
            }
        }
        if ($emailExist) {
            header("Location: ../../admin/editResidentDetails.php?user_id=$user_id&action=email_existed");
        }
    } else {
        //Step 3. Execute the SQL query.	
        //update data to database
        mysqli_query($connection, "UPDATE resident SET email = '$email', name = '$name', tel_number = '$tel_number', unit_no = '$unit_no', gender = '$gender', block = '$block', level = '$level' WHERE resident_id = $user_id");

        //Step 4. Process the results.
        //display success message & the new data can be viewed on index.php
        header("Location: ../../admin/manageResidents.php?action=resident_updated");

        //Step 5: Freeing Resources and Closing Connection using mysqli
        mysqli_close($connection);
    }
}


?>