<?php
session_start();
if (empty($_SESSION['userid'])) {
	header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Nearby Facilities</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
  <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <div class="bottom icontainer" id="logo">
      <img src="../assets/img/logo.png" width="230" height="100" />
    </div>
    <hr />
    <div class="icontainer">
      <a href="viewnearbyfacilities.html">
        <div class="selected navcontrol">
          <i class="fa-solid fa-house-medical"></i>
          <span>View Nearby Facilities</span>
        </div>
      </a>
      <a href="registervisitor.html">
        <div class="navcontrol">
          <i class="fa-solid fa-user-group"></i>
          <span>Register Visitor</span>
        </div>
      </a>
      <a href="reportcovquarantinestats.html">
        <div class="navcontrol">
          <i class="fa-solid fa-bed"></i>
          <span>Quarantine Status</span>
        </div>
      </a>
    </div>
    <hr />
    <div class="bottom icontainer">
      <div class="profilebox">
        <div><i class="fa-solid fa-circle-question"></i></div>
        <div class="wordprofilebox">
          <div style="font-weight: bold"><span>Need help?</span></div>
          <div><span>Please check our FAQ</span></div>
        </div>
        <div><a href="../TermsFAQ.html"><button>FAQ</button></a></div>
      </div>
      <div class="logout">
         <a href="../login.php"><button><i class="fa-solid fa-right-from-bracket"></i>Logout</button></a>
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
              <span>View Nearby Facilities</span>
            </div>
          </div>
          <div style="font-weight: bold">
            <span>View Nearby Facilities</span>
          </div>
        </div>
        <div class="rightdash">
          <div class="status"><span>RESIDENT</span></div>
          <a href="profile.html">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>
      <div class="d-flex flex-column px-4 mt-4">
        <!-- enter your code here -->


        <!-- Example single danger button -->
        <div class="row">
          <div class="col">
            <div class="btn-group" style="width: 100%;">
              <button type="button" class="btn btn-primary btn-lg dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Restaurant
              </button>
              <ul class="dropdown-menu justify-content-start align-items-center">
                <li><a class="dropdown-item" href="facilities/McDonalds.php">McDonalds</a></li>
                <li><a class="dropdown-item" href="facilities/KFC.php">KFC</a></li>
                <li><a class="dropdown-item" href="facilities/Dominos.php">Dominos</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="btn-group" style="width: 100%;">
              <button type="button" class="btn btn-success btn-lg dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Medical
              </button>

              <ul class="dropdown-menu justify-content-start align-items-center">
                <li><a class="dropdown-item" href="facilities/SJMC.php">Subang Jaya Medical Center</a></li>
                <li><a class="dropdown-item" href="facilities/KPJ.php">KPJ Damansara Specialist Hospital</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              </ul>
            </div>
          </div>
          <div class="col">
            <div class="btn-group" style="width: 100%;">
              <button type="button" class="btn btn-danger btn-lg dropdown-toggle" data-bs-toggle="dropdown"
                aria-expanded="false">
                Grocery
              </button>
              <ul class="dropdown-menu justify-content-start align-items-center">
                <li><a class="dropdown-item" href="facilities/speedmart.php">99 Speedmart</a></li>
                <li><a class="dropdown-item" href="facilities/7eleven.php">7-Eleven</a></li>
                <li><a class="dropdown-item" href="facilities/kk.php">KK Supermart</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </main>
</body>

</html>  