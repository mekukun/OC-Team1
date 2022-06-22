<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Nearby Facilities</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet.css" />
  <script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
</head>

<body>
  <nav>
    <div class="bottom icontainer" id="logo">
      <img src="../../assets/img/logo.png" width="230" height="100" />
    </div>
    <hr />
    <div class="icontainer">
      <a href="../viewnearbyfacilities.php">
        <div class="selected navcontrol">
          <i class="fa-solid fa-house-medical"></i>
          <span>View Nearby Facilities</span>
        </div>
      </a>
      <a href="../registervisitor.html">
        <div class="navcontrol">
          <i class="fa-solid fa-user-group"></i>
          <span>Register Visitor</span>
        </div>
      </a>
      <a href="../reportcovquarantinestats.php">
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
        <div><button onclick="window.location.href='../../TermsFAQ.html#FAQ'">FAQ</button></div>
      </div>
      <div class="logout">
        <a href="../../login.php"><button>
            <i class="fa-solid fa-right-from-bracket"></i>Logout
          </button></a>
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
          <div class="status"><span>LOW RISK</span></div>
          <a href="../profile.html">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>
      <div class="face pt-4">
        <!-- enter your code here -->

        <button id="backbtn" onclick="window.location.href='../viewnearbyfacilities.php'">BACK</button>

        <?php
        include_once('../../assets/php/config.php');
        session_start();
        $num = 1;
        $sql = "SELECT * FROM grocery WHERE grocery_id = '" . $num . "'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {


        ?>

            <div style="text-align:center;">
              <img src="../../assets/img/7eleven.jpg" class="img-fluid" alt="Responsive image" height="400" width="400">
            </div>
            <br>
            <p>

              <strong>

                <?php echo $row["description"]; ?>

              </strong>

            <h4> <strong> Contact Us</strong> </h4>
            <strong>
              <?php echo $row["contact"]; ?>
            </strong>
            <h4> <strong> Address</strong> </h4>
            <strong>
              <?php echo $row["address"]; ?>
            </strong>
            </p>
        <?php
          }
        }

        ?>
      </div>
    </div>
    </div>
  </main>
</body>

</html>