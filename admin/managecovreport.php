<?php
include_once('../assets/php/config.php');
session_start();
?>

<?php
function getcirclecolor($reportstatus)
{
  if ($reportstatus == "Rejected") {
    return "<i class=\"fa-solid fa-circle fa-xs\" id=\"delete\"></i>";
  } else if ($reportstatus == "In Progress") {
    return "<i class=\"fa-solid fa-circle fa-xs\" id=\"inprogress\"></i>";
  } else if ($reportstatus == "Pending") {
    return "<i class=\"fa-solid fa-circle fa-xs\" id=\"pending\"></i>";
  } else if ($reportstatus == "Completed") {
    return "<i class=\"fa-solid fa-circle fa-xs\" id=\"completed\"></i>";
  }
}

function getactivityinfo($activity)
{
  $activityinfo = [
    'id' => '',
    'class' => ''
  ];
  if ($activity == "Inspection begin for report") {
    $activityinfo['id'] = "inspectionbegin";
    $activityinfo['class'] = "fa-magnifying-glass";
    return $activityinfo;
  } else if ($activity == "Call the respondent of report") {
    $activityinfo['id'] = "call";
    $activityinfo['class'] = "fa-phone";
    return $activityinfo;
  } else if ($activity == "Validate report") {
    $activityinfo['id'] = "validate";
    $activityinfo['class'] = "fa-check";
    return $activityinfo;
  } else if ($activity == "Complete report") {
    $activityinfo['id'] = "completed";
    $activityinfo['class'] = "fa-square-check";
    return $activityinfo;
  } else if ($activity == "Reject report") {
    $activityinfo['id'] = "reject";
    $activityinfo['class'] = "fa-circle-exclamation";
    return $activityinfo;
  } else if ($activity == "Update note in report") {
    $activityinfo['id'] = "note";
    $activityinfo['class'] = "fa-notes-medical";
    return $activityinfo;
  } else if ($activity == "Delete report") {
    $activityinfo['id'] = "delete";
    $activityinfo['class'] = "fa-trash";
    return $activityinfo;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Covid-19 Reports</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
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
          <div class="status"><span>ADMIN</span></div>
          <a href="profileadmin.html">
            <div><i class="fa-solid fa-user"></i><span>User</span></div>
          </a>
        </div>
      </div>
      <div class="face">
        <div class="statsboard">
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Updates</span>
              <div>
                <span><?php
                      $todaydate = date("Y-m-d");
                      $yesterday = date("Y-m-d", strtotime("yesterday"));

                      $stmtTodayUpdate = $connection->prepare("SELECT * FROM cov_report WHERE ReportStatus != 'Pending' AND LastActivityDate = ?");
                      $stmtTodayUpdate->bind_param("s", $todaydate);
                      $stmtTodayUpdate->execute();
                      $result = $stmtTodayUpdate->get_result();

                      $stmtTodayUpdate->close();
                      $todayReport = mysqli_num_rows($result);
                      echo $todayReport;
                      ?></span>
                <?php
                $stmtYesUpdate = $connection->prepare("SELECT * FROM cov_report WHERE ReportStatus != 'Pending' AND LastActivityDate = ?");
                $stmtYesUpdate->bind_param("s", $yesterday);
                $stmtYesUpdate->execute();
                $result = $stmtYesUpdate->get_result();

                $stmtYesUpdate->close();
                $yesReport = mysqli_num_rows($result);

                $perUpdate = ($todayReport / $yesReport) * 100;

                if ($perUpdate > 100) {
                  $newper = (int)$perUpdate - 100;
                  echo "<span id = \"increase\">+$newper%</span>";
                } else if ($perUpdate < 100) {
                  $newper = 100 - (int)$perUpdate;
                  echo "<span id = \"decrease\">-$newper%</span>";
                } else {
                  echo "<span id = \"increase\">+0%</span>";
                }
                ?>
              </div>
            </div>
            <i class="fa-solid fa-hand-holding-medical fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Active Cases</span>
              <div>
                <span><?php
                      $stmtTodayCase = $connection->prepare("SELECT * FROM active_cases WHERE Date = ?");
                      $stmtTodayCase->bind_param("s", $todaydate);
                      $stmtTodayCase->execute();
                      $result = $stmtTodayCase->get_result();

                      $stmtTodayCase->close();
                      $todayCase =  mysqli_num_rows($result);
                      echo $todayCase;
                      ?></span>
                <?php
                $stmtYesCase = $connection->prepare("SELECT * FROM active_cases WHERE Date = ?");
                $stmtYesCase->bind_param("s", $yesterday);
                $stmtYesCase->execute();
                $result = $stmtYesCase->get_result();

                $stmtYesCase->close();
                $yesCase = mysqli_num_rows($result);

                $perCase = ($todayCase / $yesCase) * 100;

                if ($perCase > 100) {
                  $newper = (int)$perCase - 100;
                  echo "<span id = \"increase\">+$newper%</span>";
                } else if ($perCase < 100) {
                  $newper = 100 - (int)$perCase;
                  echo "<span id = \"decrease\">-$newper%</span>";
                } else {
                  echo "<span id = \"increase\">+0%</span>";
                }
                ?>
              </div>
            </div>
            <i class="fa-solid fa-virus-covid fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Today's Visitors</span>
              <div>
                <span><?php
                      $stmtTodayV = $connection->prepare("SELECT * FROM booking_details WHERE VisitingDate = ?");
                      $stmtTodayV->bind_param("s", $todaydate);
                      $stmtTodayV->execute();
                      $result = $stmtTodayV->get_result();

                      $stmtTodayV->close();
                      $todayV = mysqli_num_rows($result);
                      echo $todayV;
                      ?></span>
                <?php
                $stmtYesV = $connection->prepare("SELECT * FROM booking_details WHERE VisitingDate = ?");
                $stmtYesV->bind_param("s", $yesterday);
                $stmtYesV->execute();
                $result = $stmtYesV->get_result();

                $stmtYesV->close();
                $yesV = mysqli_num_rows($result);

                $perV = ($todayV / $yesV) * 100;

                if ($perV > 100) {
                  $newper = (int)$perV - 100;
                  echo "<span id = \"increase\">+$newper%</span>";
                } else if ($perCase < 100) {
                  $newper = 100 - (int)$perV;
                  echo "<span id = \"decrease\">-$newper%</span>";
                } else {
                  echo "<span id = \"increase\">+0%</span>";
                }
                ?>
              </div>
            </div>
            <i class="fa-solid fa-users fa-lg"></i>
          </div>
          <div class="stats glasscard">
            <div class="statsbody">
              <span>Completed Report</span>
              <div>
                <span><?php
                      $stmtComReport = $connection->prepare("SELECT * FROM cov_report WHERE ReportStatus = 'Completed' AND LastActivityDate = ?");
                      $stmtComReport->bind_param("s", $todaydate);
                      $stmtComReport->execute();
                      $result = $stmtComReport->get_result();

                      $stmtComReport->close();
                      $todayComReport =  mysqli_num_rows($result);
                      echo $todayComReport;
                      ?></span>
                <?php
                $stmtComReport = $connection->prepare("SELECT * FROM cov_report WHERE ReportStatus = 'Completed' AND LastActivityDate = ?");
                $stmtComReport->bind_param("s", $yesterday);
                $stmtComReport->execute();
                $result = $stmtComReport->get_result();

                $stmtComReport->close();
                $yesComReport = mysqli_num_rows($result);

                $perComReport = ($todayComReport / $yesComReport) * 100;

                if ($perComReport > 100) {
                  $newper = (int)$perComReport - 100;
                  echo "<span id = \"increase\">+$newper%</span>";
                } else if ($perComReport < 100) {
                  $newper = 100 - (int)$perComReport;
                  echo "<span id = \"decrease\">-$newper%</span>";
                } else {
                  echo "<span id = \"increase\">+0%</span>";
                }
                ?>
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
                  <span><?php
                        $monthnow = date('m');

                        $stmtmonthReport = $connection->prepare("SELECT * FROM cov_report WHERE ReportStatus = 'Completed' AND month(LastActivityDate) = ?");
                        $stmtmonthReport->bind_param("s", $monthnow);
                        $stmtmonthReport->execute();
                        $result = $stmtmonthReport->get_result();

                        $stmtmonthReport->close();
                        $monthReport =  mysqli_num_rows($result);
                        echo $monthReport;
                        ?> completed</span>
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

                  if (isset($_GET['searchid'])) {
                    $searchid = $_GET['searchid'];

                    $stmtColumn = $connection->prepare("SELECT * FROM cov_report WHERE ReportID = ? ORDER BY LastActivityDate DESC, LastActivityHour DESC");
                    $stmtColumn->bind_param("s", $searchid);
                    $stmtColumn->execute();
                    $result = $stmtColumn->get_result();

                    $stmtColumn->close();
                  } else {
                    $sql = "SELECT * FROM cov_report ORDER BY LastActivityDate DESC, LastActivityHour DESC";
                    $result = mysqli_query($connection, $sql);
                  }

                  while ($res = $result->fetch_assoc()) {
                    $reportid = $res["ReportID"];
                    $lastdate = $res["LastActivityDate"];
                    $reportstatus = $res["ReportStatus"];
                    $lastactivity = $res["LastActivity"];
                    $lasthour = $res["LastActivityHour"];

                    $reallastdate = strtoupper(date("j F Y", strtotime($lastdate)));
                    $circlecolor = getcirclecolor($reportstatus);
                  ?>
                    <tr data-id=<?php echo $reportid; ?>>
                      <td>#<?php echo $reportid; ?></td>
                      <td><?php echo $reallastdate; ?></td>
                      <td><?php echo $circlecolor, $reportstatus; ?></td>
                      <td><?php echo $lastactivity; ?></td>
                      <td><button type="button" class="btn p-0 editreportbutton"><i class="fa-solid fa-eye"></i></button></td>
                      <td><button type="button" class="btn p-0 deletereportbutton"><i class="fa-solid fa-trash"></i></button></td>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
                <tbody id="reporttable"></tbody>
              </table>
            </div>
          </div>
          <div class="reportactivity glasscard">
            <div class="upperactivity">
              <span>Activity Overview</span>
              <div class="my-2 activityoverview">
                <?php
                $monthlast = date('m', strtotime("-1 month"));

                $stmtcurmonthActivity = $connection->prepare("SELECT * FROM admin_activity WHERE month(ActivityDate) = ?");
                $stmtcurmonthActivity->bind_param("s", $monthnow);
                $stmtcurmonthActivity->execute();
                $result = $stmtcurmonthActivity->get_result();

                $stmtcurmonthActivity->close();
                $curmonthActivity =  mysqli_num_rows($result);

                $stmtlastmonthActivity = $connection->prepare("SELECT * FROM admin_activity WHERE month(ActivityDate) = ?");
                $stmtlastmonthActivity->bind_param("s", $monthlast);
                $stmtlastmonthActivity->execute();
                $result = $stmtlastmonthActivity->get_result();

                $stmtlastmonthActivity->close();
                $lastmonthActivity =  mysqli_num_rows($result);

                $permonthActivity = ($curmonthActivity / $lastmonthActivity) * 100;

                if ($permonthActivity > 100) {
                  $newper = (int)$permonthActivity - 100;
                  echo "<i class=\"fa-solid fa-arrow-up\"></i><span>+$newper%</span><span> this month</span>";
                } else if ($permonthActivity < 100) {
                  $newper = 100 - (int)$permonthActivity;
                  echo "<i class=\"fa-solid fa-arrow-down\"></i><span>-$newper%</span><span> this month</span>";
                } else {
                  echo "<i class=\"fa-solid fa-arrow-up\"></i><span>+0%</span><span> this month</span>";
                }
                ?>
              </div>
            </div>
            <div class="bottomactivity" id="activitylist">
              <?php
              $adminid = $_SESSION['adminid'];

              $stmtActivity = $connection->prepare("SELECT * FROM admin_activity WHERE admin_id=? ORDER BY ActivityDate DESC, ActivityHour DESC");
              $stmtActivity->bind_param("s", $adminid);
              $stmtActivity->execute();
              $result = $stmtActivity->get_result();
              $stmtActivity->close();

              while ($res = $result->fetch_assoc()) {
                $reportid = $res["ReportID"];
                $lastdate = $res["ActivityDate"];
                $lasthour = $res["ActivityHour"];
                $activity = $res["Activity"];

                $reallasthour = date("g:iA", strtotime($lasthour));
                $reallastdate = strtoupper(date("j F Y", strtotime($lastdate)));
              ?>
                <div class="activity" id="<?php echo getactivityinfo($activity)['id']; ?>"><i class="fa-solid <?php echo getactivityinfo($activity)['class']; ?>"></i>
                  <div class="activitytext">
                    <span>
                      <?php echo "$activity #$reportid"; ?>
                    </span>
                    <span>
                      <?php echo "$reallastdate $reallasthour"; ?>
                    </span>
                  </div>
                </div>
              <?php
              }
              $connection->close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <div class="modalblock"></div>

  <!-- ################################################################################ -->

  <!-- editModal -->
  <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" tabindex="-1" aria-hidden="true">
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
              <span id="unitnumber"></span>
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
                <input type="radio" class="form-check-input" id="callresidentactivitycheck" name="radio-stacked" required disabled />
                <label class="form-check-label" for="callresidentactivitycheck">Resident Confirmation</label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="roominspectioncheck" name="radio-stacked" required disabled />
                <label class="form-check-label" for="roominspectioncheck">Room Inspection</label>
              </div>
            </div>
            <div class="col mb-3">
              <label for="reportnote" class="form-label modalsubtitle">Note</label>
              <textarea class="form-control" id="reportnote" rows="3" disabled></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" id="submitbtn" data-bs-dismiss="modal" class="btn btn-primary">
            Save changes
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- ############################################################################################ -->

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script rel="preload" src="https://kit.fontawesome.com/c2eb2d7176.js" as="script" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {

      $('.editreportbutton').on('click', function() {

        $id = $(this).closest("tr").data("id");
        reset();
        $oldnote = "";

        $(".modal-title #editModaltitle").text("Report #" + $id);

        $.ajax({
          url: "modalprocess.php",
          method: "post",
          data: {
            id: $id
          },
          success: function(result) {
            $infoarr = result;
            $('#residentname').text($infoarr['name']);
            $('#unitnumber').text($infoarr['unit_no']);
            $('#contactnumber').text($infoarr['tel_number']);
            $('#reportdesc').text($infoarr['Description']);
            $oldnote = $infoarr['Note'];
            $('#reportnote').text($oldnote);
            $("#reportvalidation").prop("checked", () => {
              if ($infoarr['ReportStatus'] == 'In Progress' || $infoarr['ReportStatus'] == 'Completed') {
                return true;
              } else {
                return false;
              }
            });
            $("#completereport").prop("checked", () => {
              if ($infoarr['ReportStatus'] == 'Completed') {
                return true;
              } else {
                return false;
              }
            });
            $("#rejectreport").prop("checked", () => {
              if ($infoarr['ReportStatus'] == 'Rejected') {
                return true;
              } else {
                return false;
              }
            });
            $("#defaultactivity").prop("checked", true);
            $("#roominspectioncheck").prop("checked", () => {
              if ($infoarr['LastActivity'] == 'Room Inspection') {
                return true;
              } else {
                return false;
              }
            });
            $("#callresidentactivitycheck").prop("checked", () => {
              if ($infoarr['LastActivity'] == 'Resident Confirmation') {
                return true;
              } else {
                return false;
              }
            });
          },
          dataType: "json"
        });

        $('#editmodal').modal('show');

        $('#submitbtn').on('click', function() {

          $d = new Date();
          $month = $d.getMonth() + 1;
          $day = $d.getDate();
          $lastdate = $d.getFullYear() + '-' + ($month < 10 ? '0' : '') + $month + '-' + ($day < 10 ? '0' : '') + $day;
          $lasthour = $d.getHours() + ":" + $d.getMinutes() + ":" + $d.getSeconds();

          $newnote = $('#reportnote').val();
          $reportstatus = "Pending";
          $lastactivity = "Report Submission";
          $activity = "";

          if ($('#reportvalidation').is(":checked")) {
            $reportstatus = "In Progress";
            $lastactivity = "Report Validation";
            $activity = "Validate report";
          }

          if ($('#callresidentactivitycheck').is(":checked")) {
            $lastactivity = "Resident Confirmation";
            $activity = "Call the respondent of report";
          } else if ($('#roominspectioncheck').is(":checked")) {
            $lastactivity = "Room Inspection";
            $activity = "Inspection begin for report";
          }

          if (!($oldnote === $newnote)) {
            $activity = "Update note in report";
          }

          if ($('#completereport').is(":checked")) {
            $reportstatus = "Completed";
            $lastactivity = "Report Closed";
            $activity = "Complete report";
          }
          if ($('#rejectreport').is(":checked")) {
            $reportstatus = "Rejected"
            $lastactivity = "Report Closed";
            $activity = "Reject report";
          }

          $.ajax({
            url: "modalupdateprocess.php",
            method: "post",
            data: {
              id: $id,
              reportstatus: $reportstatus,
              lastactivity: $lastactivity,
              note: $newnote,
              activity: $activity,
              lastdate: $lastdate,
              lasthour: $lasthour
            },
            success: function(result) {
              location.reload(true);
            }
          });
        });

      });

      $('.deletereportbutton').on("click", function() {

        $d = new Date();
        $month = $d.getMonth() + 1;
        $day = $d.getDate();
        $lastdate = $d.getFullYear() + '-' + ($month < 10 ? '0' : '') + $month + '-' + ($day < 10 ? '0' : '') + $day;
        $lasthour = $d.getHours() + ":" + $d.getMinutes() + ":" + $d.getSeconds();

        $id = $(this).closest("tr").data("id");
        $(".modal-title #deleteModaltitle").text("Report #" + $id);
        $(".modal-body #deleteModalbody").text(
          "Are you sure you want to delete Report #" + $id + "?"
        );

        $("#deletereportModal").modal("show");

        $('#reportmodaldeleteButton').on("click", function() {
          $.ajax({
            url: "modaldeleteprocess.php",
            method: "post",
            data: {
              id: $id,
              lastdate: $lastdate,
              lasthour: $lasthour
            },
            success: function(result) {
              location.reload(true);
            }
          });
        });
      });

      $('#searchreportid').on('keypress', function(event) {
        var keycode = event.keyCode || event.which;
        if (keycode == "13") {
          if ($("#searchreportid").val() == "") {
            window.location.href = "managecovreport.php";
          } else {
            $searchid = $("#searchreportid").val();
            $currentURL = 'managecovreport.php?searchid=' + $searchid;
            window.location.href = $currentURL;
          }
        }
      });

      $('#rejectreport').on('change', function() {
        if ($(this).is(":checked")) {
          $("#reportvalidation").prop("disabled", true);
          $("#completereport").prop("disabled", true);
        } else {
          $("#reportvalidation").prop("disabled", false);
          $("#completereport").prop("disabled", true);
        }
      });

      $('#reportvalidation').on('change', function() {
        if ($(this).is(":checked")) {
          $("#rejectreport").prop("disabled", true);
          $("#rejectreport").prop("checked", false);
          $("#completereport").prop("disabled", false);
        } else {
          $("#rejectreport").prop("disabled", false);
          $("#completereport").prop("disabled", true);
          $("#completereport").prop("checked", false);
        }
      });

      $('#editbtn').on('click', function() {
        $("#reportvalidation").prop("disabled", false);
        $("#defaultactivity").prop("disabled", false);
        $("#callresidentactivitycheck").prop("disabled", false);
        $("#roominspectioncheck").prop("disabled", false);
        $("#reportnote").prop("disabled", false);
        $("#submitbtn").prop("disabled", false);
        if ($("#reportvalidation").is(":checked")) {
          $("#rejectreport").prop("disabled", true);
          $("#completereport").prop("disabled", false);
        } else {
          $("#rejectreport").prop("disabled", false);
          $("#completereport").prop("disabled", true);
        }
      });

      function reset() {
        $("#rejectreport").prop("checked", false);
        $("#completereport").prop("checked", false);
        $("#reportvalidation").prop("checked", false);
        $("#rejectreport").prop("disabled", true);
        $("#completereport").prop("disabled", true);
        $("#reportvalidation").prop("disabled", true);
        $("#defaultactivity").prop("disabled", true);
        $("#callresidentactivitycheck").prop("disabled", true);
        $("#roominspectioncheck").prop("disabled", true);
        $("#reportnote").prop("disabled", true);
        $("#submitbtn").prop("disabled", true);
      }
    });
  </script>
</body>

</html>