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
    <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
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
            <a href="./manageresidents.php">
                <div class="selected navcontrol">
                    <i class="fa-solid fa-house-medical"></i>
                    <span>Manage Residents</span>
                </div>
            </a>
            <a href="./managecovreport.php">
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
                            <span>Resident Details</span>
                        </div>
                    </div>
                    <div style="font-weight: bold"><span>View Resident Details</span></div>
                </div>
                <div class="rightdash">
                    <div class="status"><span>ADMIN</span></div>
                    <div><i class="fa-solid fa-user"></i><span>User</span></div>
                </div>
            </div>
            <div class="px-4">
                <!-- enter your code here -->
                <?php
                $user_id = $_GET['user_id'];
                //extract data
                $result = mysqli_query($connection, "SELECT * FROM resident WHERE resident_id = $user_id");
                $res = mysqli_fetch_array($result);
                ?>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="name" class="form-label">Name</label>
                            <textarea class="form-control" aria-label="name" readonly><?php echo $res["name"] ?></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="email" class="form-label">Email address</label>
                            <textarea class="form-control" aria-label="email" readonly><?php echo $res["email"] ?></textarea>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="gender" class="form-label">Gender</label>
                            <textarea class="form-control" aria-label="gender" readonly><?php echo $res["gender"] ?></textarea>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label for="telNum" class="form-label">Telephone number</label>
                            <textarea class="form-control" aria-label="telNum" readonly><?php echo $res["tel_number"] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <label for="block" class="form-label">Block Number</label>
                            <textarea class="form-control" aria-label="block" readonly><?php echo $res["block"] ?></textarea>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="level" class="form-label">Level</label>
                            <textarea class="form-control" aria-label="level" readonly><?php echo $res["level"] ?></textarea>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <label for="unit_no" class="form-label">Unit Number</label>
                            <textarea class="form-control" aria-label="unit_no" readonly><?php echo $res["unit_no"] ?></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <a href="./editResidentDetails.php?user_id=<?php echo $res["resident_id"] ?>"><button type="button" class="btn btn-primary">Edit</button></a>
                            <button type="button" class="btn btn-danger" id="deleteResidentButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Delete
                            </button>
                        </div>

                    </div>

                </form>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            </div>
                            <div class="modal-body">
                                <p><?php echo $res['name']?> resident account will be deleted.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                <a href="../assets/php/deleteResident.php?user_id=<?php echo $res['resident_id']?>"><button type="button" class="btn btn-danger">Yes</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <p class="text-center fst-italic">Copyright &#169; 2022 Online Community Service<br>
                        <a href="mailto:yourfirstname@yourlastname.com">yourfirstname@yourlastname.com</a>
                    </p>
                </footer>

            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
</body>

</html>