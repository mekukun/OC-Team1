<?php
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JavaJam Coffee House</title>
    <!-- <link rel="stylesheet" type="text/css" href="./stylesheets/javajam.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <div class="container bg-primary bg-opacity-25 px-0">
        <header>
            <div class="container">
                <h1>JavaJam Coffee House</h1>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50 my-2">
            <div class="container-fluid">
                <div class="container-0">
                    <a class="navbar-brand" href="index.html">
                        <img src="./images/javajamlogo.jpg" alt="" width="30" height="24" />
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="menu.html">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="music.html">Music</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.html">Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="jobs.html">Logout</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="px-4">
            <?php

            $mName = $myEmail = $password = $rpassword = "";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['rpassword']) && isset($_POST['tel']) && isset($_POST['unitno'])) {
                    $mName = $_POST['name'];
                    $myEmail = $_POST['email'];
                    $password = $_POST['password'];
                    $telNo = $_POST['tel'];
                    $unitNo = $_POST['unitno'];
                } else {
                    echo "Please fill in all the blanks.";
                    echo "<a class=\"nav-link\" a href=\"signup.php\">Sign Up </a>";
                }
            }

            $sql = "SELECT email FROM resident WHERE email = '$myEmail'";
            $result = mysqli_query($connection, $sql);
            if (mysqli_num_rows($result) != 0) {
                echo "<h2>Email already exists.</h2>";
                echo "<a class=\"nav-link\" a href=\"signup.php\">Sign Up </a>";
                echo "<a class=\"nav-link\" a href=\"login.php\">Log In </a>";
            } else {
                $stmt = $connection->prepare("INSERT INTO resident(email, password, name, tel_number, unit_no) VALUE (?,?,?,?,?)");
                $stmt->bind_param("sssss", $myEmail, $password, $mName, $telNo, $unitNo);
                $stmt->execute();

                echo "<h2>Registration successfull.</h2>";
                echo "<a class=\"nav-link\" href=\"login.php\"> Log In </a>";
                $stmt->close();
            }

            # Free resouces
            $connection->close();
            ?>
        </main>
        <footer>
            <hr />
            <div class="container pb-1">
                <p class="fst-italic text-center">
                    Copyright &copy; 2021 JavaJam Coffee House<br />
                    <a href="mailto:yourfirstname@yourlastname.com">yourfirstname@yourlastname.com</a><br />
                </p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/scripts/script.js"></script>
    <script src="/scripts/calculateCost.js"></script>
</body>

</html>