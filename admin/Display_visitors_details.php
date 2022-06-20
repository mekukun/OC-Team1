<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage visitors</title>
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
    <style>

      .child{
        border: 3.5px solid;
        border-top-left-radius: 60px;
        border-bottom-left-radius:  10px;
        border-right: 0ch;
        padding: 29px;
        height: fit-content;
        
      }
      .child2{
        border: 3.5px solid;
        border-top-right-radius: 60px;
        border-bottom-right-radius: 10px;
        border-left: 0ch;
        padding: 29px;
        height: fit-content;
        
      }
      @media (min-width: 768px) {
        .parent{
          height: 100%;
          width:fit-content;
          padding:1.5em;
          display: flex;
          overflow-x: scroll;
          
        }
        .dashboard4 { 
          margin-left: 20.3%; 
          margin-right: 10.3%;
          font-weight: 400;
          align-items: flex-start;
          font-size: 1rem;
          float: top;
          display: flex;
          height: 88.4vh;
          width: 78%;
          justify-content: space-between;
          overflow-y: scroll;
          border: #00b8be outset thin;
          border-left-color: cornflowerblue;
          border-top-left-radius: cornflowerblue;
          border-top-right-radius: rgb(184, 138, 37);
          
          border-radius: 99px;
          border-bottom: 0ch;
          border-bottom-right-radius:0%;
          border-bottom-left-radius:0%;
          
        }
        .dashboard4::-webkit-scrollbar {
        display: none;
      }
      }
    </style>
  </head>

  <body>
    <nav>
      <div class="bottom icontainer" id="logo">
        <img src="../assets/img/logo.png" width="230" height="100" />
      </div>
      <hr />
      <div class="icontainer">
      <a href="Display_visitors_details.php">
          <div class="selected navcontrol">
            <i class="fa-solid fa-house-medical"></i>
            <span>Manage Visitors</span>
          </div>
        </a>
        <a href="../admin/manageresidents.html">
          <div class="navcontrol">
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
      <div class="bottom icontainer">
        <div class="profilebox">
          <div><i class="fa-solid fa-circle-question"></i></div>
          <div class="wordprofilebox">
            <div style="font-weight: bold"><span>Need help?</span></div>
            <div><span>Please check our FAQ</span></div>
          </div>
          <div>
            <a href="../../TermsFAQ.html"><button>FAQ</button></a>
          </div>
        </div>
        <div class="logout">
          <a href="..\assets\php\logout.php"
            ><button>
              <i class="fa-solid fa-right-from-bracket"></i>Logout
            </button></a
          >
        </div>
      </div>
    </nav>
    <main>
        <div class="glass">
            <div class="dashboard">
            <div class="leftdash">
                <div class="up">
                <div style="color: grey">
                    <span>Pages / Manage Visitors /</span>
                </div>
                <div style="margin-left: 0.2rem">
                    <span>Register new visitors</span>
                </div>
                </div>
                <div style="font-weight: bold">
                <span>Register new visitors</span>
                </div>
            </div>
            <div class="rightdash1">
                <div class="status"><span>ADMIN</span></div>
                <a href="../profileadmin.html">
                <div><i class="fa-solid fa-user"></i><span>User</span></div>
                </a>
            </div>
            </div>
            <div class="">
            <!-- enter your code here -->
                <div class="dashboard4">
                  <section class="parent">
                      <section class="child">
                          <?php
                              include_once('../assets/php/config.php');
                              
                              $stmt3 = $connection->prepare("SELECT * FROM visitor_information");
                              $stmt3->execute();
                              $result = $stmt3->get_result();


                              echo '<table class="table">
                                      <thead>
                                        <tr>
                                            <th scope="col" >FirstName</th>
                                            <th scope="col" >LastName</th>
                                            <th scope="col" >City</th>
                                            <th scope="col" >Province</th>
                                            <th scope="col" >MobileNumber</th>
                                            <th scope="col" >HomeNumber</th>
                                            <th scope="col" >Email</th>
                                        </tr>
                                      </thead>';

                              while ($row = $result->fetch_assoc())
                              {
                                  echo 
                                      '<tbody>
                                        <tr>
                                            <td>'.$row["FirstName"].'</td>
                                            <td>'.$row["LastName"].'</td>
                                            <td>'.$row["City"].'</td>
                                            <td>'.$row["Province"].'</td>
                                            <td>'.$row["MobileNumber"].'</td>
                                            <td>'.$row["HomeNumber"].'</td>
                                            <td>'.$row["Email"].'</td>
                                        </tr>
                                      </tbody>';
                              }
                              echo '</table>';
                          ?>
                      </section>
                      
                      <section class="child2">
                          <?php
                              include_once('../assets/php/config.php');
                              
                              $stmt4 = $connection->prepare("SELECT * FROM booking_details");
                              $stmt4->execute();
                              $result1 = $stmt4->get_result();

                              echo '<table class="table">
                                      <thead>
                                        <tr>
                                            <th scope="col">VisitingDate</th>
                                            <th scope="col">CarNumber</th>
                                            <th scope="col">UnitNumber</th>
                                            <th scope="col">Number_of_Adults_Guests</th>
                                        </tr>
                                      </thead>';

                              while ($row = $result1->fetch_assoc())
                              {
                                  echo 
                                      '<tbody>
                                        <tr>
                                            <td>'.$row["VisitingDate"].'</td>
                                            <td>'.$row["CarNumber"].'</td>
                                            <td>'.$row["UnitNumber"].'</td>
                                            <td>'.$row["Number_of_Adults_Guests"].'</td>
                                        </tr>
                                      <tbody>';
                              }
                              echo '</table>';

                          ?>
                      </section>
                  </section>
                </div>
            </div>
        </div>
    </main>
    <script
      src="https://kit.fontawesome.com/c2eb2d7176.js"
      crossorigin="anonymous"
    ></script>
    <script src="./assets/js/bootstrap.bundle.js"></script>
  </body>
</html>

