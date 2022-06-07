<?php
include_once('../assets/php/config.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Covid-19 Reports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
  <script rel="preload" src="https://kit.fontawesome.com/c2eb2d7176.js" as="script" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../assets/js/covreportcolumn.js"></script>
  <script src="../assets/js/covreportactivity.js"></script>
  <script src="../assets/js/covreportdeletereport.js"></script>
  <script src="../assets/js/covreportmodal.js"></script>
</head>

<body>
  <nav>
    <div class="bottom icontainer" id="logo">
      <img src="../assets/img/logo.png" width="230" height="100" />
    </div>
    <hr />
    <div class="icontainer">
      <a href="manageresidents.html">
        <div class="navcontrol">
          <i class="fa-solid fa-house-chimney icon-sizing"></i>
          <span>Manage Residents</span>
        </div>
      </a>
      <a href="managecovreport.html">
        <div class="selected navcontrol">
          <i class="fa-solid fa-flag"></i>
          <span>Manage Cov-19 Reports</span>
        </div>
      </a>
    </div>
    <hr />
    <div class="bottom icontainer">
      <div class="profilebox">
        <div>
          <i class="fa-solid fa-circle-question"></i>
        </div>
        <div class="wordprofilebox">
          <div style="font-weight: bold"><span>Need help?</span></div>
          <div><span>Please check our FAQ</span></div>
        </div>
        <div>
          <a href="../TermsFAQ.html"><button>FAQ</button></a>
        </div>
      </div>
      <div class="logout">
        <a href="../login.php"><button>
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
              <span>Manage Covid-19 Reports</span>
            </div>
          </div>
          <div style="font-weight: bold">
            <span>Manage Covid-19 Reports</span>
          </div>
        </div>
        <div class="rightdash">
          <div class="status"><span>LOW RISK</span></div>
          <a href="profileadmin.html">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>
      <div class="face">
        <div class="statsboard">
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Reports</span>
              <div>
                <span>23</span>
                <span>+55%</span>
              </div>
            </div>
            <i class="fa-solid fa-hand-holding-medical fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Active Cases</span>
              <div>
                <span>11</span>
                <span>+61%</span>
              </div>
            </div>
            <i class="fa-solid fa-virus-covid fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Visitors</span>
              <div>
                <span>13</span>
                <span id="decrease">-15%</span>
              </div>
            </div>
            <i class="fa-solid fa-users fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Completed Report</span>
              <div>
                <span>10</span>
                <span>+5%</span>
              </div>
            </div>
            <i class="fa-solid fa-file-circle-check fa-lg"></i>
          </div>
        </div>
        <div class="reportboard">
          <div class="reportlist glasscard">
            <div class="d-flex justify-content-between align-items-center">
              <div class="upperactivity">
                <span>Reports</span>
                <div class="my-2">
                  <i class="fa-solid fa-check-double"></i>
                  <span>63 completed</span>
                  <span>this month</span>
                </div>
              </div>
              <div class="form-outline w-50">
                <input type="search" id="searchreportid" class="form-control text-center" placeholder="Enter Report ID without #" aria-label="Search" />
              </div>
            </div>
            <div class="wrapaccord">
              <table class="table table-striped table-hover table-borderless managecovreport">
                <thead>
                  <tr>
                    <th scope="col">Report ID</th>
                    <th scope="col">Last Update</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last Activity</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $sql = "SELECT * FROM cov_report ORDER BY LastActivityDate DESC, LastActivityHour DESC";
                  $result = mysqli_query($connection, $sql);
                  while ($res = $result->fetch_assoc()) {
                    $reportid = $res["ReportID"];
                    $lastdate = $res["LastActivityDate"];
                    $reportstatus = $res["ReportStatus"];
                    $lastactivity = $res["LastActivity"];

                    $reallastdate = strtoupper(date("j F Y", strtotime($lastdate)));
                    // $lasthour = $res["LastActivityHour"];
                    // $reallasthour = date("g:iA", strtotime($lasthour));

                    echo "<tr data-id = \"$reportid\"><td>#$reportid</td>";
                    echo "<td>$reallastdate</td>";
                    echo "<td>$reportstatus</td>";
                    echo "<td>$lastactivity</td>";
                    echo "<td><button type=\"button\" class=\"btn p-0 editreportbutton\" ><i class=\"fa-solid fa-eye\"></i></button></td>";
                    echo "<td><button type=\"button\" class=\"btn p-0 deletereportbutton\"><i class=\"fa-solid fa-trash\"></i></button></td></tr>";
                  }

                  $connection->close();
                  ?>

                </tbody>
                <tbody id="reporttable"></tbody>
              </table>
            </div>
          </div>
          <div class="reportactivity glasscard">
            <div class="upperactivity">
              <span>Activity Overview</span>
              <div class="my-2">
                <i class="fa-solid fa-arrow-up"></i>
                <span>24%</span>
                <span>this month</span>
              </div>
            </div>
            <div class="bottomactivity" id="activitylist"></div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="modalblock"></div>
  <!-- editModal -->
  <div class="modal fade" id="editreportModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span id="editModaltitle"></span>
          </h5>
          <button class="btn p-0" id="editbtn">
            <i class="fa-solid fa-pen-to-square p-2"></i>
          </button>
          <button type="button" class="btn-close" id="closemodalbutton" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column">
          <div class="row mb-2">
            <div class="col-md-auto">
              <span class="modalsubtitle">Name:</span>
              <span id="residentname"></span>
            </div>
            <div class="col-md-auto mb-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="reportvalidation" data-checkbox required disabled />
                <label class="form-check-label modalsubtitle" for="reportvalidation">Validate</label>
                <div class="invalid-feedback">
                  Please validate to start process the report.
                </div>
              </div>
            </div>
            <div class="col-md-auto mb-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="completereport" data-checkbox required disabled />
                <label class="form-check-label modalsubtitle" for="completereport">Completed</label>
              </div>
            </div>
            <div class="col-md-auto mb-2">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="rejectreport" data-checkbox required disabled />
                <label class="form-check-label modalsubtitle" for="rejectreport">Reject</label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-auto">
              <span class="modalsubtitle">Unit No:</span>
              <span id="roomnumber"></span>
            </div>
            <div class="col-md-auto">
              <span class="modalsubtitle">Contact number:</span>
              <span id="contactnumber"></span>
            </div>
          </div>
          <div class="d-flex flex-column mb-2">
            <span class="modalsubtitle">Description:</span>
            <span id="reportdesc"></span>
          </div>
          <div class="row">
            <div class="col">
              <span class="modalsubtitle">Last Activity Executed</span>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="defaultactivity" name="radio-stacked" required disabled />
                <label class="form-check-label" for="defaultactivity">None</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="notifyuser" name="radio-stacked" required disabled />
                <label class="form-check-label" for="notifyuser">Notify user to modify report.</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="callresidentactivitycheck" name="radio-stacked" required disabled />
                <label class="form-check-label" for="callresidentactivitycheck">Call the resident.</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="roominspectioncheck" name="radio-stacked" required disabled />
                <label class="form-check-label" for="roominspectioncheck">Begin room inspection.</label>
              </div>
            </div>
            <div class="col mb-3">
              <label for="reportnote" class="form-label modalsubtitle">Note</label>
              <textarea class="form-control" id="reportnote" rows="3" disabled></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" data-bs-dismiss="modal" class="btn btn-primary">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- deletereportModal -->
  <div class="modal fade" id="deletereportModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            <span id="deleteModaltitle"></span>
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center">
          <span id="deleteModalbody"></span>
          <span>This process cannot be undone.</span>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" data-bs-dismiss="modal" id="reportmodaldeleteButton" class="btn btn-danger">
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

</html>