<?php 
include_once("config.php");

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];
$gender = $_POST["gender"];
$tel_number = $_POST["tel_number"];
$block = $_POST["block"];
$level = $_POST["level"];
$unit_no = $_POST["unit_no"];

if(empty($name) || empty($email) || empty($password) || empty($rpassword)){
    if (empty($name)) {
        header("Location: ../../admin/registerNewResident.php?action=empty_name");
    }

    if (empty($email)) {
        header("Location: ../../admin/registerNewResident.php?action=empty_email");
    }

    if (empty($password)) {
        header("Location: ../../admin/registerNewResident.php?action=empty_password");
    }

    if (empty($rpassword)) {
        header("Location: ../../admin/registerNewResident.php?action=empty_rpassword");
    }
} elseif(checkPassword($password, $rpassword) == false){
    header("Location: ../../admin/registerNewResident.php?action=pwd_mismatch");
} else {
    $result1 = mysqli_query($connection, "SELECT email FROM resident");
    $emailExist = false;
    while ($res = mysqli_fetch_array($result1)) {
        if ($res['email'] == $email) {
            $emailExist = true;
            break;
        }
    }
    if ($emailExist) {
        header("Location: ../../admin/registerNewResident.php?action=email_existed");
    } else {
        //Step 3. Execute the SQL query.	
        //insert data to database
        $result2 = mysqli_query($connection, "SELECT MAX(resident_id) as last_id FROM resident");
        $res1 = mysqli_fetch_array($result2);
        $lastID = $res1['last_id'];
        if (empty($lastID)) {
            $lastID = 1;
        } else {
            $lastID = $lastID + 1;
        }
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($connection, "INSERT INTO resident(resident_id,email,password,name,tel_number,unit_no,gender,block,level) VALUES('$lastID','$email','$password','$name','$tel_number','$unit_no','$gender','$block','$level')");

        //Step 4. Process the results.
        //display success message & the new data can be viewed on index.php
        header("Location: ../../admin/manageResidents.php?action=resident_registered");

        //Step 5: Freeing Resources and Closing Connection using mysqli
        mysqli_close($connection);
    }
}

function checkPassword($pwd1, $pwd2){
    if($pwd1 == $pwd2){
        return true;
    } else {
        return false;
    }
}
