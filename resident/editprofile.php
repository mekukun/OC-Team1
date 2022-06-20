<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Profile</title>
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/css/stylesheet.css"
    />
    <script
      rel="preload"
      src="https://kit.fontawesome.com/c2eb2d7176.js"
      as="script"
      crossorigin="anonymous"
    ></script>
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
        <a href="viewnearbyfacilities.html">
          <div class="navcontrol">
            <i class="fa-solid fa-house-medical"></i>
            <span>View Nearby Facilities</span>
          </div>
        </a>

        <!-- Register Visitor Link -->
        <a href="registervisitor.html">
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
          <a href="../login.php"
            ><button>
              <i class="fa-solid fa-right-from-bracket"></i>Logout
            </button></a
          >
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
            <a href="profile.php"
              ><div><i class="fa-solid fa-user"></i><span>User</span></div></a
            >
          </div>
        </div>

        <?php
          include_once('../assets/php/config.php');
          session_start();
          
          $sql = "SELECT * FROM resident WHERE resident_id = '" . $_SESSION["userid"] . "'";
          $result = $connection->query($sql);

          if ($result->num_rows > 0)
          {
            while ($row = $result->fetch_assoc())
            {
              
            
        ?>

        <!-- Sub Container -->
        <div class="face">

          <!-- Banner -->
          <div class="banner">
            <img class="banner-image" src="../assets/img/banner01.png"/>

            <!-- Profile Picture and Username -->
              <div class="profile-div">
                <div class="profile-pic">
                  <img src="../assets/img/pfp.jpg" name=photo id="photo"/>
                  <input type="file" id="file">
                  <label for="file" id="uploadBtn">Choose Photo</label>
                </div>

                <div class="username">
                  <h1><?php echo $row["name"];?></h1>
                </div>
              </div>

          </div>

          <form action= "../assets/php/updateProfile.php" method="post">
            
            <!-- Profile -->
            <div class="profile-card">
              <div class="leftprofile">
                <div class="address">

                  <h1>Address</h1>
                  <label for="apartment">Unit No:</label><br>
                  <input type="text" name="unit_no" value = <?php echo $row["unit_no"];?> size = "31"><br>

                  <label for="address">Level:</label><br>
                  <input type="text" name="address" value=<?php echo $row["address"]; ?> size = "31"><br>

                  <label for="state">Block:</label><br>
                  <input type="text" name="state" value=<?php echo $row["state"];?> size = "31"><br>
                
                </div>
              

                <div class="contact">

                  <h1>Contact</h1>
                  <label for="tel_number">Phone Number:</label><br>
                  <input type="text" name="tel_number" value=<?php echo $row["tel_number"];?> size = "31"><br>

                  <label for="email">Email:</label><br>
                  <input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value=<?php echo $row["email"];?> size = "31"><br>
                
                </div>

              </div>
            
              <div class = "rightprofile">
                <div class = "basic-info">
                  <h1>Basic Information</h1>
                  <label for="name">Name:</label><br>
                  <input type="text" name="name" value=<?php echo $row["name"];?> size = "31"><br>

                  <label for="gender">Gender:</label><br>
                  <input type="text" name="gender" value=<?php echo $row["gender"];?> size = "31">

                  <br><br>

                  <label for="password">Password:</label><br>
                  <input type="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,25}$" value=<?php echo $row["password"];?> size = "31">

                </div>

                <?php
        
            
                    }
                
              
                  }
                ?>

                <div class="btn-class">

                  <input type="file" id="file">
                  <button for="file" id="uploadBtn">Change Profile Picture</button>
                  
                  <input type="submit" value="Update Profile" >

                </div>
              </div>

            </div>  
          </form>




        </div>


      </div>


    </main>
  </body>
</html>
