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
  <title>Register Visitor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
  <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
  <!-- <script src="/assets/js/Visitor.js"></script> -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>


<body>
  <nav>
    <!-- Navigation Container -->
    <div class="bottom icontainer" id="logo">
      <img src="../assets/img/logo.png" width="230" height="100" />
    </div>
    <hr />
    <div class="icontainer">
      <!-- View Nearby Facilities Link -->
      <a href="viewnearbyfacilities.php">
        <div class="navcontrol">
          <i class="fa-solid fa-house-medical"></i>
          <span>View Nearby Facilities</span>
        </div>
      </a>

      <!-- Register Visitor Link -->
      <a href="registervisitor.php">
        <div class="selected navcontrol">
          <i class="fa-solid fa-user-group"></i>
          <span>Register Visitor</span>
        </div>
      </a>

      <!-- Quarantine Status -->
      <a href="reportcovquarantinestats.php">
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
        <div><button onclick="window.location.href='../TermsFAQ.html#FAQ'">FAQ</button></div>
      </div>
      <div class="logout">
        <a href="..\assets\php\logout.php"><button><i class="fa-solid fa-right-from-bracket"></i>Logout</button></a>
      </div>
    </div>
  </nav>
  <main id="mainV">
    <div class="glass">
      <div class="dashboard">
        <div class="leftdash">
          <div class="up">
            <div style="color: grey"><span>Pages /</span></div>
            <div style="margin-left: 0.2rem">
              <span>Register Visitor</span>
            </div>
          </div>
          <div style="font-weight: bold;"><span>Register Visitor</span></div>
        </div>
        <div class="rightdash" style="-ms-flex-align: center; align-self:flex-end;">
          <div class="status"><span>LOW RISK</span></div>
          <a href="profile.php">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>
      <div style="padding-left: 15.7em;">
        <!-- enter code here -->
        <div class="dashboard2">
          <div class="leftdash2">
            <div class="formcontainer">
              <div class="title">Register Visitor</div>
              <form action="..\assets\php\register-visitor.php" method="post">
                <div class="user-details">

                  <!-- Name -->
                  <div style="margin-right: 40%;" class="name">
                    <div class="input-box">
                      <span class="details">First Name</span>
                      <input type="text" placeholder="Enter Your First Name" id="Fname" name="Firstname" required>
                    </div>
                    <div class="input-box">
                      <span class="details">Last Name</span>
                      <input style="padding-left: 0%;" type="text" placeholder="Enter Your Last Name" id="Lname" name="Lastname" required>
                    </div><br>
                    <hr>
                  </div><br>

                  <!-- Address -->
                  <div class="info">
                    <div class="globe">
                      <div class="input-box">
                        <span class="details">City </span>
                        <input class="ab" type="text" placeholder="Eg. Abu Dhabi" id="city" name="City" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Province/Country</span>
                        <input class="ab" type="text" placeholder="Eg. United Arab Emirates" name="Province" id="prov">
                      </div>
                    </div>


                  </div>

                  <!-- User Info -->
                  <div class="info">
                    <div class="globe">
                      <div class="input-box">
                        <span class="details">Mobile Number </span>
                        <input class="ab" type="tel" placeholder="+ CountryCode-Number" id="Pphone" name="MobileNumber" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Home Number</span>
                        <input class="ab" type="tel" placeholder="Enter home number" name="HomeNumber">
                      </div>
                    </div>

                    <div class="input-box">
                      <span class="details">Email</span>
                      <input class="email" type="email" placeholder="Enter email" id="email" name="Email" required>
                    </div>

                  </div>

                  <!-- Booking Information -->
                  <div class="booking">

                    <div class="globe">
                      <div class="input-box">
                        <span class="details">visiting Date</span>
                        <input class="ab" type="date" placeholder="Date" id="checkIn" name="VisitingDate" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Car Number</span>
                        <input class="ab" type="text" placeholder="Enter car number" name="CarNumber" id="Car">
                      </div>


                    </div>

                    <div class="globe">
                      <div class="input-box">
                        <span class="details">Unit Number</span>
                        <input class="ab" type="text" placeholder="Enter unit number" name="UnitNumber" id="roomNum" required>
                      </div>

                      <div class="input-box">
                        <span class="details">Number of Adults Guests</span> <!-- Max 3 adults per room-->
                        <input class="ab" type="number" min="1" placeholder="No.of adults" name="Number_of_Adults_Guests" id="guestNum">
                      </div>
                    </div><br><br>

                  </div>
                  <!-- Print out price info Information -->
                  <!-- Submit-->
                </div>
                <div class="buttonV">
                  <input type="submit" id="Submit"></input>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </main>
</body>

</html>