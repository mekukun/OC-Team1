<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Profile</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/profilesheet.css" />
  <script rel="preload" src="https://kit.fontawesome.com/c2eb2d7176.js" as="script" crossorigin="anonymous"></script>
</head>

<body>
  <!-- Navigation Bar -->
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
        <div class="navcontrol">
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

    <!-- FAQ Container -->
    <div class="bottom icontainer">
      <div class="profilebox">
        <div><i class="fa-solid fa-circle-question"></i></div>
        <div class="wordprofilebox">
          <div style="font-weight: bold"><span>Need help?</span></div>
          <div><span>Please check our FAQ</span></div>
        </div>
        <div>
          <a href="../TermsFAQ.html"><button>FAQ</button></a>
        </div>
      </div>

      <!-- Logout Button -->
      <div class="logout">
        <a href="../login.php"><button>
            <i class="fa-solid fa-right-from-bracket"></i>Logout
          </button></a>
      </div>
    </div>
  </nav>

  <!-- Main Container -->
  <main>
    <!-- Dashboard -->
    <div class="glass">
      <div class="dashboard">
        <div class="leftdash">
          <div class="up">
            <div style="color: grey"><span>Pages /</span></div>
            <div style="margin-left: 0.2rem"><span>Profile</span></div>
          </div>
          <div style="font-weight: bold"><span>Profile</span></div>
        </div>
        <div class="rightdash">
          <div class="status"><span>RESIDENT</span></div>
          <a href="profile.php">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>


        <?php
        include_once('../assets/php/config.php');
        session_start();

        $sql = "SELECT * FROM resident WHERE resident_id = '" . $_SESSION["userid"] . "'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {


        ?>

          <!-- Sub Container -->
          <div class="face" id="faceprofile">

            <!-- Banner -->
            <div class="banner">
              <img class="banner-image" src="../assets/img/banner01.png" />

              <!-- Profile Picture and Username -->
              <div class="profile-div">
                <div class="profile-pic">
                  <img src="../assets/img/<?php echo $row["photo"]; ?>" id="photo" />
                  <input type="file" id="file">
                  <label for="file" id="uploadBtn">Choose Photo</label>
                </div>

                <div class="username">
                  <h1><?php echo $row["name"]; ?></h1>
                </div>
              </div>

            </div>

            <!-- Profile -->
            <div class="profile-card">
              <div class="leftprofile">
                <div class="address">

                  <h1>Address</h1>
                  <label for="apartment">Unit No:</label><br>
                  <input type="text" name="unit_no" value=<?php echo $row["unit_no"]; ?> size="31" readonly><br>

                  <label for="postcode">Level:</label><br>
                  <input type="text" name="level" value=<?php echo $row["level"]; ?> size="31" readonly><br>

                  <label for="state">Block:</label><br>
                  <input type="text" name="block" value=<?php echo $row["block"]; ?> size="31" readonly>

                </div>


                <div class="contact">

                  <h1>Contact</h1>
                  <label for="tel_number">Phone Number:</label><br>
                  <input type="text" name="tel_number" value=<?php echo $row["tel_number"]; ?> size="31" readonly><br>

                  <label for="email">Email:</label><br>
                  <input type="text" name="email" value=<?php echo $row["email"]; ?> size="31" readonly><br>

                </div>

              </div>

              <div class="rightprofile">
                <div class="basic-info">
                  <h1>Basic Information</h1>
                  <label for="name">Name:</label><br>
                  <input type="text" name="name" value=<?php echo $row["name"]; ?> size="31" readonly><br>

                  <label for="gender">Gender:</label><br>
                  <input type="text" name="gender" value=<?php echo $row["gender"]; ?> size="31" readonly>

                </div>


                <div class="btn-class">

                  <a href="editprofile.php">
                    <button>Edit Profile</button>
                  </a>

                  <button type="button" id="deleteProfileButton" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete Account
                  </button>
                  
                </div>
              </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>DELETE USER ACCOUNT</strong></h5>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the account? <br>
                    <strong>WARNING!</strong> This process cannot be undone.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="no" data-bs-dismiss="modal">Cancel</button>
                    <form action= "../assets/php/deleteProfile.php" method="post">
                      <input type="submit" value="Delete" >
                    </form>

                  </div>
                </div>
              </div>
            </div>

            <?php


}
}
?>

          </div>

    </div>

  </main>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap.bundle.js"></script>

</body>

</html>
