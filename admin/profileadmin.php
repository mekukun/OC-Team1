<?php
session_start();
?>

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
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
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
      <a href="manageresidents.html">
        <div class="navcontrol">
          <i class="fa-solid fa-house-medical"></i>
          <span>Manage Residents</span>
        </div>
      </a>
      <a href="managecovreport.html">
        <div class="navcontrol">
          <i class="fa-solid fa-user-group"></i>
          <span>Manage Cov-19 Reports</span>
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
          <div class="status"><span>LOW RISK</span></div>
          <a href="profileadmin.html">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>

      <!-- Sub Container -->
      <div class="subcontainer">
        <!-- User Main-Profile -->

        <section class="profilepic_card">
          <div class="profile">
            <figure>
              <img src="../assets/img/pfp.jpg" alt="profile" width="250px" height="250px" />
            </figure>
          </div>
        </section>

        <section class="nickname">
          <h1>Stickman Black</h1>
        </section>

        <div class="leftprofile">
          <!-- Address -->
          <section class="address_card">
            <!-- Address Container -->
            <div class="address">
              <h1 class="heading">Address</h1>
              <div class="upper">
                <h1>Resident 237</h1>
                <p>Apartment Lestari Hill A<br />Malaysia</p>
              </div>
            </div>
          </section>

          <!-- Contact Info -->
          <section class="contactinfo_card">
            <div class="contact">
              <h1 class="heading">Contact Information</h1>
              <ul>
                <li class="number">
                  <h1 class="label">Phone Number:</h1>
                  <span class="info">+6018-XXXXXXX</span>
                </li>

                <li class="email">
                  <h1 class="label">Email Address:</h1>
                  <span class="info">blackstickman@gmail.com</span>
                </li>
              </ul>
            </div>
          </section>
        </div>

        <div class="rightprofile">
          <!-- About -->
          <section class="about_card">
            <div class="userinfo">
              <h1 class="heading">Basic Information</h1>
              <ul>
                <li class="name">
                  <h1 class="label">Full Name:</h1>
                  <span class="info"> StickMan Black</span>
                </li>

                <li class="job">
                  <h1 class="label">Occupation:</h1>
                  <span class="info">Painter</span>
                </li>
                <li class="sex">
                  <h1 class="label">Gender:</h1>
                  <span class="info">Male</span>
                </li>

                <li class="birthdate">
                  <h1 class="label">Birth date:</h1>
                  <span class="info">23 January 1990</span>
                </li>
              </ul>
            </div>
          </section>

          <!-- Login Details-->
          <section class="login_card">
            <div class="logindetails">
              <h1 class="heading">Login Details</h1>
              <ul>
                <li class="username">
                  <h1 class="label">Username:</h1>
                  <span class="info">Blackyy</span>
                </li>

                <li class="password">
                  <h1 class="label">Password:</h1>
                  <span class="info">xxxxxxxx</span>
                </li>
              </ul>
            </div>
          </section>

          <!-- Buttons -->
          <section class="button_area">
            <div class="edit">
              <button>Edit Profile</button>
            </div>
            <div class="delete">
              <button>Delete Account</button>
              <a href="managecovreport.php">cov report</a>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
</body>

</html>