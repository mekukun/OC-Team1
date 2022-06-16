<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/stylesheet.css" />
  <title>Login</title>
</head>

<body>

  <div class="container_login">
    <div class="forms-container_login">
      <div class="login">
        <form action="assets/php/process_login.php" method="post" class="log-in-form">

          <h5 style="color:red;">
            <?php
            if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
              echo "Wrong Username / Password";
            }
            ?>
          </h5>

          <h2 class="title_login">LOGIN</h2>
          <div class="input-field_login">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email" name="email" />
          </div>
          <div class="input-field_login">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,25}$" />
            <span class="tooltiptext_login">
              8=
              < Password Length <=20. <br />
              PASSWORD MUST HAVE AT LEAST: <br />
              &nbsp; - one lowercase letter (a - z). <br />
              &nbsp; - one uppercase letter (A - Z). <br />
              &nbsp; - numeric value (0-9). <br />
              &nbsp; - special symbol (!@#$%^&*=+-_) <br />
            </span>
          </div>
          <br />
          <div>
            <input checked class="check_login" type="radio" name="userType" value="resident" />
            <label for="Resident">Resident &nbsp;&nbsp;&nbsp;</label>
            <input class="check_login" type="radio" id="Admin" name="userType" value="admin" />
            <label for="Admin">Admin</label><br />
          </div>
          <div>
            <br />
            <input required type="checkbox" class="check_login" />
            <label>
              I agree to
              <span style="color: blue" onclick="window.location.href='TermsFAQ.html#Terms'"><u>Terms</u></span></label>
          </div>
          <br />
          <input type="submit" value="LOGIN" class="btn_login solid" />
        </form>
      </div>
    </div>
    <div class="panels-container_login">
      <div class="panel left-panel">
        <img src="assets/img/white_logo.png" class="image_login" />
        <div class="content_login">
          <p>
            Engage with residents in your neighborhood
            <br />
            keep in touch with each other.
            <br />
            Different features for your community
          </p>
        </div>
      </div>
    </div>
  </div>
  <script src="/assets/js/login.js"></script>
</body>

</html>