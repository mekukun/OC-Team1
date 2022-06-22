<?php 
session_start();

if(isset($_SESSION['adminid']) && isset($_SESSION['email']) && isset($_SESSION['userType'])){
    $adminID = $_SESSION['adminid'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
}else{
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Residents</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
    <?php include_once("../assets/php/config.php"); ?>
    <style>
        button:hover {
            cursor: pointer;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <nav>
        <div class="container">
            <img src="../assets/img/logo.png" width="230" height="150">
        </div>
        <hr />
        <div class="container">
            <a href="manageresidents.php">
                <div class="selected navcontrol">
                    <i class="fa-solid fa-house-medical"></i>
                    <span>Manage Residents</span>
                </div>
            </a>
            <a href="managecovreport.php">
                <div class="navcontrol">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Manage Cov-19 Reports</span>
                </div>
            </a>
        </div>
        <hr />
        <div class="bottom container">
            <div class="profilebox">
                <div><i class="fa-solid fa-circle-question"></i></div>
                <div class="wordprofilebox">
                    <div style="font-weight: bold"><span>Need help?</span></div>
                    <div><span>Please check our FAQ</span></div>
                </div>
                <div><button>FAQ</button></div>
            </div>
            <div class="logout">
                <a href="../assets/php/logout.php"><button><i class="fa-solid fa-right-from-bracket"></i>Logout</button></a>
            </div>
        </div>
    </nav>
    <main>
        <div class="glass">
            <div class="dashboard">
                <div class="leftdash">
                    <div class="up">
                        <div style="color: grey"><span>Pages / Manage Residents /</span></div>
                        <div style="margin-left: 0.2rem">
                            <span>Register new resident</span>
                        </div>
                    </div>
                    <div style="font-weight: bold"><span>Register new resident</span></div>
                </div>
                <div class="rightdash">
                    <div class="status"><span>ADMIN</span></div>
                    <div><i class="fa-solid fa-user"></i><span>User</span></div>
                </div>
            </div>
            <div class="px-4">
                <!-- enter your code here -->
                <?php if (isset($_GET['action'])) { ?>
                    <?php if ($_GET['action'] == "pwd_mismatch") { ?>
                        <div class="row">
                            <p style="color: red;">Passwords did not match! Try again.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "empty_name") { ?>
                        <div class="row">
                            <p style="color: red;">Name field is empty.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "empty_email") { ?>
                        <div class="row">
                            <p style="color: red;">Email field is empty.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "empty_password") { ?>
                        <div class="row">
                            <p style="color: red;">Password field is empty.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "empty_rpassword") { ?>
                        <div class="row">
                            <p style="color: red;">Confirm Password field is empty.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "email_existed") { ?>
                        <div class="row">
                            <p style="color: red;">This email has been used.</p>
                        </div>
                    <?php } ?>
                <?php } ?>
                <form action="../assets/php/registerResident.php" method="post">
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-6">
                            <label for="rpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="rpassword" name="rpassword" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender">
                                <option value="">Choose your gender</option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="telNum" class="form-label">Telephone number</label>
                            <input type="text" class="form-control" id="telNum" name="tel_number">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <label for="block" class="form-label">Block Number</label>
                            <input type="text" class="form-control" id="block" name="block">
                        </div>
                        <div class="col-4">
                            <label for="level" class="form-label">Level</label>
                            <input type="text" class="form-control" id="level" name="level">
                        </div>
                        <div class="col-4">
                            <label for="unit_no" class="form-label">Unit Number</label>
                            <input type="text" class="form-control" id="unit_no" name="unit_no">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="submit" value="Submit" class="btn btn-primary">Create new resident</button>
                        </div>
                    </div>

                </form>
                <footer>
                    <p class="text-center fst-italic">Copyright &#169; 2022 Online Community Service<br>
                        <a href="mailto:yourfirstname@yourlastname.com">yourfirstname@yourlastname.com</a>
                    </p>
                </footer>

            </div>
        </div>
    </main>
    <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>