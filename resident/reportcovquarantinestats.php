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
	<title>Report Quarantine Status</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<script src="https://kit.fontawesome.com/c2eb2d7176.js" crossorigin="anonymous"></script>
	<style>
		.divider {
			width: 5px;
			height: auto;
			display: inline-block;
		}
		
		divider2 {
			width: 5px;
			height: auto;
			display: block;
		}
		.action_btn {
		  width: 200px;
		  margin: 0 auto;
		  display: inline;
		  padding: 1rem;
		  background: linear-gradient(to right bottom, #5680e9, #8860d0);
		  border: white;
		  border-radius: 0.5rem;
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
			<a href="viewnearbyfacilities.php">
				<div class="navcontrol">
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
			<a href="reportcovquarantinestats.php">
				<div class="selected navcontrol">
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
				<a href="../assets/php/logout.php"><button><i class="fa-solid fa-right-from-bracket"></i>Logout</button></a>
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
							<span>Report Covid-19 Quarantine Status</span>
						</div>
					</div>
					<div style="font-weight: bold">
						<span>Report Covid-19 Quarantine Status</span>
					</div>
				</div>
				<div class="rightdash">
					<div class="status"><span>RESIDENT</span></div>
					<a href="profile.php">
						<div><i class="fa-solid fa-user"></i><span>User</span></div>
					</a>
				</div>
			</div>
		</div>
		<div class="face">
			<div class="showHide">
				<center>
					<button class="action_btn" onclick="report()">
						<span><b>Report</span>
					</button>
					
					<div class="divider">
					</div>

					
					<button class="action_btn" onclick="states()">
						<span><b>Total Cases</b></span>
					</button>
					

					<div class="divider">
					</div>

					
					<button class="action_btn" onclick="daily()">
						<span><b>Daily Statistics</b></span>
					</button>
					

					<div class="divider">
					</div>

					
					<button class="action_btn" onclick="weekly()">
						<span><b>Weekly Statistics</b></span>
					</button>
					



				</center>
			</div>
			<?php
			include_once('../assets/php/config.php');



			$display = "none";
			$display_2 = "block";
			if (isset($_POST['submit'])) {
				$action = $_POST['submit'];
				$display = "block";
				$display_2 = "none";
			}
			?>
			<div id="makeReport" style="display:<?php echo $display_2 ?>;">
				<div class="reportboard">
					<div class="reportlist glasscard">
						<div class="upperactivity">
							<span>Reports</span>
						</div>
						<div class="wrapaccord">
							<form method='POST' action='reportcovquarantinestats.php'>
								<table class="table table-striped table-hover table-borderless">
									<thead>
										<tr>
											<th style="width:200px">
												<font color="Red">Report ID
											</th>
											<th style="width:300px">
												<font color="Red">Last Update
											</th>
											<th style="width:200px">
												<font color="Red">Status
											</th>
											<th style="width:100px">
												<font color="Red">
													<center>Action
											</th>
										</tr>
									</thead>
									<tbody>

										<?php

										$sql = "SELECT * FROM cov_report WHERE resident_id = '" . $_SESSION["userid"] . "'";
										$result = $connection->query($sql);

										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
												echo "<tr>";
												echo "<th>#" . $row["ReportID"] . "</th>";

												echo "<th>" . $row["LastActivity"] . "</th>";
												$code = "";
												if ($row["ReportStatus"] == "Completed") {
													$code = "completed";
												} else if ($row["ReportStatus"] == "Pending") {
													$code = "pending";
												} else if ($row["ReportStatus"] == "In Progress") {
													$code = "inprogress";
												} else
													$code = "pending";


										?>

												<th><i class="fa-solid fa-circle fa-xs" id="<?php echo $code; ?>"></i><?php echo $row["ReportStatus"] ?></th>
												<td>

													<center>
														<button style="border: blue;" class="profilebox" name='submit' type="submit" value="<?php echo $row["ReportID"]; ?>">View</button>
													</center>

												</td>
										<?php

												echo "</tr>";
											}
										}

										?>

									</tbody>
								</table>
							</form>
						</div>
					</div>
					<div class="reportactivity glasscard">
						<div class="upperactivity">
							<center>
								<h2>Make a Report</h2>
								<form action="../assets/php/makeReport.php" method="post">
									<hr><u>
										<h6 style="font-weight:bold">Residential Information</h4>
									</u>
									<span class="ex-title">Block</span>
									<br>
									<select name="block" id="block">
										<option value="A">Block A</option>
										<option value="B">Block B</option>
										<option value="C">Block C</option>
										<option value="D">Block D</option>
									</select>
									<br><br>
									<span class="ex-title">Floor Level</span>
									<br>
									<select name="floorLevel" id="floorLevel">
										<option value="1">Level 1</option>
										<option value="2">Level 2</option>
										<option value="3">Level 3</option>
										<option value="4">Level 4</option>
									</select>

									<br><br>
									<span>Unit Number</span>
									<br><input name="roomNo" class="a" type="text" placeholder="Unit" style="text-align:center;" required>
									<hr>

									<u>
										<h6 style="font-weight:bold">Report Description</h4>
									</u>
									
									<input type="text" id="description" name="description" style="height:100px; width:300px;" required>

									<div class="divider2">
									<br>
									</div>
									<input class="action_btn"type="submit" value="Submit">
									
								</form>
							</center>
						</div>
						<div class="bottomactivity" id="activitylist"></div>
					</div>
				</div>
				</center>
			</div>
			<?php

			$month = date_create('this week')->format('m');
			$year = date_create('this week')->format('Y');
			$today = date("d");


			$harini = "" . $year . "-" . $month . "-" . $today;

			$sql = "SELECT * FROM cov_report WHERE Block ='A' and DateCreated = '" . $harini . "'";
			// Count the number of cases in Block A
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockA = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='B' and DateCreated = '" . $harini . "'";
			// Count the number of cases in Block B
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockB = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='C' and DateCreated = '" . $harini . "'";
			// Count the number of cases in Block C
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockC = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='D' and DateCreated = '" . $harini . "'";
			// Count the number of cases in Block D
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockD = $rowcount;
			}
			?>
			<div id="daily" class="chartTable" style="display:none;">
				<canvas id="myChart3" style="width:100%;max-width:600px"></canvas>

				<script>
					var xValues = ["Block A", "Block B", "Block C", "Block D"];
					var yValues = [<?php echo $blockA ?>, <?php echo $blockB ?>, <?php echo $blockC ?>, <?php echo $blockD ?>];
					var barColors = [
						"#b91d47",
						"#00aba9",
						"#2b5797",
						"#e8c3b9"
					];

					new Chart("myChart3", {
						type: "pie",
						data: {
							labels: xValues,
							datasets: [{
								backgroundColor: barColors,
								data: yValues
							}]
						},
						options: {
							title: {
								display: true,
								text: "Active Cases (Daily)",
								fontSize: 25
							}
						}
					});
				</script>
			</div>

			<div id="weekly" class="chartTable" style="display:none;">
				<canvas id="myChart2" style="width:100%;max-width:1000px"></canvas>
				<?php
				$First_date = date_create('this week')->format('m/d');
				$Last_date = date_create('this week +6 days')->format('m/d');
				$hari = array(date_create('this week')->format('m/d'), date_create('this week +1 days')->format('m/d'), date_create('this week +2 days')->format('m/d'), date_create('this week +3 days')->format('m/d'), date_create('this week +4 days')->format('m/d'), date_create('this week +5 days')->format('m/d'),);
				$specificDate = array(date_create('this week')->format('Y-m-d'), date_create('this week +1 days')->format('Y-m-d'), date_create('this week +2 days')->format('Y-m-d'), date_create('this week +3 days')->format('Y-m-d'), date_create('this week +4 days')->format('Y-m-d'), date_create('this week +5 days')->format('Y-m-d'), date_create('this week +6 days')->format('Y-m-d'));
				//print_r ($specificDate);

				$f = "\"";
				$a = array("");
				$countCase = array();
				$value = 3;
				$block = array("A", "B", "C", "D");
				$testing = "2022-06-16";
				$kira = 0;
				//$timestamp = strtotime($specificDate[6]);

				for ($x = 0; $x < sizeof($specificDate); $x++) {
					$month = date_create('this week')->format('m');
					$year = date_create('this week')->format('Y');

					$timestamp = strtotime($specificDate[$x]);
					$year = date("Y", $timestamp);
					$month = date("m", $timestamp);
					$day = date("d", $timestamp);

					$harini = "" . $year . "-" . $month . "-" . $day;

					$sql2 = "SELECT * FROM cov_report WHERE DateCreated = '" . $harini . "' AND (ReportStatus = 'In Progress' OR ReportStatus = 'Completed')";
					// Count the number of cases in by day (for this week)
					if ($result = mysqli_query($connection, $sql2)) {
						$rowcount2 = mysqli_num_rows($result);
						$blockA2 = "" . $rowcount2 . "";
						array_push($a, $blockA2);
					}
				}

				?>

				<script>
					var xValues = [<?php echo $f . $hari[0] . $f; ?>, <?php echo $f . $hari[1] . $f; ?>, <?php echo $f . $hari[2] . $f; ?>, <?php echo $f . $hari[3] . $f; ?>, <?php echo $f . $hari[4] . $f; ?>, <?php echo $f . $hari[5] . $f; ?>, <?php echo $f . $Last_date . $f; ?>];
					var yValues = [<?php echo $a[1] ?>, <?php echo $a[2] ?>, <?php echo $a[3] ?>, <?php echo $a[4] ?>, <?php echo $a[5] ?>, <?php echo $a[6] ?>, <?php echo $a[7] ?>];

					new Chart("myChart2", {
						type: "line",
						data: {
							labels: xValues,
							datasets: [{
								fill: false,
								lineTension: 0,
								backgroundColor: "rgba(0,0,255,1.0)",
								borderColor: "rgba(0,0,255,0.1)",
								data: yValues
							}]
						},
						options: {
							legend: {
								display: false
							},
							title: {
								display: true,
								text: "Active Cases (Weekly)",
								fontSize: 25
							},
							scales: {
								yAxes: [{
									ticks: {
										min: 0
									}
								}],
							}

						}
					});
				</script>
			</div>
			<?php

			$sql = "SELECT * FROM cov_report WHERE Block ='A' AND (ReportStatus = 'In Progress' OR ReportStatus = 'Completed')";
			// Count the number of cases in Block A
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockA = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='B' AND (ReportStatus = 'In Progress' OR ReportStatus = 'Completed')";
			// Count the number of cases in Block B
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockB = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='C' AND (ReportStatus = 'In Progress' OR ReportStatus = 'Completed')";
			// Count the number of cases in Block C
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockC = $rowcount;
			}

			$sql = "SELECT * FROM cov_report WHERE Block ='D' AND (ReportStatus = 'In Progress' OR ReportStatus = 'Completed')";
			// Count the number of cases in Block D
			if ($result = mysqli_query($connection, $sql)) {
				$rowcount = mysqli_num_rows($result);
				$blockD = $rowcount;
			}
			?>

			<div id="states" class="chartTable" style="display:none;">
				<canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
				<script>
					var xValues = ["Block A", "Block B", "Block C", "Block D"];
					var yValues = [<?php echo $blockA ?>, <?php echo $blockB ?>, <?php echo $blockC ?>, <?php echo $blockD ?>];
					var barColors = ["#b91d47", "#00aba9", "#2b5797", "#e8c3b9"];

					new Chart("myChart", {
						type: "bar",
						data: {
							labels: xValues,
							datasets: [{
								backgroundColor: barColors,
								data: yValues
							}]
						},
						options: {
							legend: {
								display: false
							},
							title: {
								display: true,
								text: "Covid-19 Status (Total Cases by Block)",
								fontSize: 25
							},
							scales: {
								yAxes: [{
									ticks: {
										min: 0,
										max: 16
									}
								}],
							}
						}
					});
				</script>
			</div>
			<br>
			<center>
				<div id="newSection" style="display:<?php echo $display ?>;">
					<p id="demo"></p>
					<div class="reportlist glasscard">
						<div class="wrapaccord">
							<table class="table table-striped table-hover table-borderless">
								<thead>
									<tr>
										<th>
											<h2><b>Report Information</b></h2>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM cov_report WHERE ReportID = '" . $action . "'";
									$result = $connection->query($sql);

									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
											echo "<tr>";
											echo "<th>Report ID</th>";
											echo "<td>" . $row["ReportID"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Date Created</th>";
											echo "<td>" . $row["DateCreated"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Last Activity</th>";
											echo "<td>" . $row["LastActivity"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Last Activity Date</th>";
											echo "<td>" . $row["LastActivityDate"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Block</th>";
											echo "<td>" . $row["Block"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Level</th>";
											echo "<td>" . $row["FloorLevel"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Unit Number</th>";
											echo "<td>" . $row["unit_no"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Note</th>";
											echo "</tr>";
											echo "<tr>";
											echo "<td colspan = '2'>" . $row["Note"] . "</td>";
											echo "</tr>";

											echo "<tr>";
											echo "<th>Description</th>";
											echo "</tr>";
											echo "<tr>";
											echo "<td colspan = '2'>" . $row["Description"] . "</td>";
											echo "</tr>";
										}
									}
									?>

								</tbody>
							</table>
						</div>

						<div class="showHide">
							<button class="action_btn" onclick="report()">
								<span>Back</span>
							</button>

						</div>
					</div>
				</div>
			</center>
			<br>
			<script>
				function daily() {
					var x = document.getElementById("states");
					var y = document.getElementById("daily");
					var z = document.getElementById("weekly");
					var a = document.getElementById("makeReport");
					var b = document.getElementById("newSection");

					x.style.display = "none";
					z.style.display = "none";
					a.style.display = "none";
					b.style.display = "none";
					if (y.style.display === "none") {
						y.style.display = "block";
						y.setAttribute("align", "center")
					} else {
						y.style.display = "none";
						z.setAttribute("align", "center")
					}
				}

				function states() {
					var x = document.getElementById("states");
					var y = document.getElementById("daily");
					var z = document.getElementById("weekly");
					var a = document.getElementById("makeReport");
					var b = document.getElementById("newSection");

					y.style.display = "none";
					z.style.display = "none";
					a.style.display = "none";
					b.style.display = "none";

					if (x.style.display === "none") {
						x.style.display = "block";
						x.setAttribute("align", "center")
					} else {
						x.style.display = "none";
						z.setAttribute("align", "center")
					}
				}

				function weekly() {
					var x = document.getElementById("weekly");
					var y = document.getElementById("daily");
					var z = document.getElementById("states");
					var a = document.getElementById("makeReport");
					var b = document.getElementById("newSection");

					y.style.display = "none";
					z.style.display = "none";
					a.style.display = "none";
					b.style.display = "none";

					if (x.style.display === "none") {
						x.style.display = "block";
						x.setAttribute("align", "center")
					} else {
						x.style.display = "none";
						z.setAttribute("align", "center")
					}
				}

				function report() {

					var x = document.getElementById("weekly");
					var y = document.getElementById("daily");
					var z = document.getElementById("states");
					var a = document.getElementById("makeReport");
					var b = document.getElementById("newSection");

					x.style.display = "none";
					y.style.display = "none";
					z.style.display = "none";
					b.style.display = "none";

					if (a.style.display === "none") {
						a.style.display = "block";
						a.setAttribute("align", "center")
					} else {
						a.style.display = "none";
						z.setAttribute("align", "center")
					}
				}

				function specific() {
					var hello = document.getElementById("myText").value;
					alert(hello);
					var x = document.getElementById("weekly");
					var y = document.getElementById("daily");
					var z = document.getElementById("states");
					var a = document.getElementById("makeReport");
					var b = document.getElementById("newSection");

					x.style.display = "none";
					y.style.display = "none";
					z.style.display = "none";
					a.style.display = "none";

					if (b.style.display === "none") {
						b.style.display = "block";
						b.setAttribute("align", "center")
					} else {
						b.style.display = "none";
						z.setAttribute("align", "center")
					}
				}
			</script>
		</div>

	</main>
</body>

</html>