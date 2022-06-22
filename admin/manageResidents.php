<?php
session_start();

if (isset($_SESSION['adminid']) && isset($_SESSION['email']) && isset($_SESSION['userType'])) {
    $adminID = $_SESSION['adminid'];
    $email = $_SESSION['email'];
    $userType = $_SESSION['userType'];
} else {
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
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap5.min.css" />
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
                        <div style="color: grey"><span>Pages /</span></div>
                        <div style="margin-left: 0.2rem">
                            <span>Manage Residents</span>
                        </div>
                    </div>
                    <div style="font-weight: bold"><span>Resident Listing</span></div>
                </div>
                <div class="rightdash">
                    <div class="status"><span>ADMIN</span></div>
                    <div><i class="fa-solid fa-user"></i><span>User</span></div>
                </div>
            </div>
            <div class="px-4 container">
                <!-- enter your code here -->
                <div class="row">
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <a href="registerNewResident.php"><button class="btn btn-success">Register new
                                resident</button></a>
                    </div>
                </div><br>
                <?php if (isset($_GET['action'])) { ?>
                    <?php if ($_GET['action'] == "resident_updated") { ?>
                        <div class="row">
                            <p style="color: green;">Resident details updated.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "resident_deleted") { ?>
                        <div class="row">
                            <p style="color: green;">Resident account deleted.</p>
                        </div>
                    <?php } elseif ($_GET['action'] == "resident_registered") { ?>
                        <div class="row">
                            <p style="color: green;">Resident account registered.</p>
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="row">
                    <div class="col">
                        <?php $result1 = mysqli_query($connection, "SELECT resident_id,name,block,level,unit_no FROM resident");
                        if (mysqli_num_rows($result1) > 0) { ?>
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Block</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Unit Number</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($res1 = mysqli_fetch_array($result1)) { ?>
                                        <tr>
                                            <th><?php echo $res1['name'] ?></th>
                                            <td><?php echo $res1['block'] ?></td>
                                            <td><?php echo $res1['level'] ?></td>
                                            <td><?php echo $res1['unit_no'] ?></td>
                                            <td>
                                                <a href="viewResidentDetails.php?user_id=<?php echo $res1['resident_id'] ?>"><button type="button" class="btn btn-primary">View
                                                        Details</button></a>
                                                <a href="editResidentDetails.php?user_id=<?php echo $res1['resident_id'] ?>"><button type="button" class="btn btn-secondary">Edit
                                                        Details</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <p class="text-center">No data</p>
                        <?php } ?>
                    </div>

                </div><br>

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
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>