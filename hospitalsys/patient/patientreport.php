<?php
session_start();
include_once '../assets/conn/dbconnect.php';
$session=$_SESSION[ 'patientSession'];

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Treatment Checkout</title>
		<!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
		<link href="assets/css/material.css" rel="stylesheet">
		
		<link href="assets/css/default/style.css" rel="stylesheet">
		<link href="assets/css/default/blocks.css" rcel="stylesheet">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" />

	</head>
	<body>
		<!-- navigation -->
		<nav class="navbar navbar-default " role="navigation">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<ul class="nav navbar-nav">
							<li><a href="patient.php">Home</a></li>
							<!-- <li><a href="profile.php?patientId=<?php echo $userRow['icPatient']; ?>" >Profile</a></li> -->
							
							<li><a href="patientreport.php?patientId=<?php echo $userRow['icPatient']; ?>">Patient Report</a></li>
						</ul>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								
								<li>
									<a href="patientapplist.php?patientId=<?php echo $userRow['icPatient']; ?>"><i class="glyphicon glyphicon-file"></i> Treatment</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="patientlogout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- navigation -->
<!-- display appoinment start -->
<?php


echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='page-header'>";
echo "<h1>Here is your Patient Report. </h1>";
echo "</div>";
echo "<div class='panel panel-primary'>";
echo "<div class='panel-heading'>List of Reports</div>";
echo "<div class='panel-body'>";
echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Date In</th>";
echo "<th>Symptoms </th>";
echo "<th>Tests </th>";
echo "<th>Medical Suggestion </th>";
echo "<th>Treatment </th>";
echo "<th>Doctor Name</th>";
echo "<th>Ward No.</th>";
echo "<th>Date Out</th>";

echo "</tr>";
echo "</thead>";
$res = mysqli_query($con,"SELECT * FROM patienttreatment where icPatient = $session && dateout > '0000-00-00 00:00:00'");

if (!$res) {
die("Error running $sql: " . mysqli_error());
}


while ($userRow = mysqli_fetch_array($res)) {
	$id =$userRow['id'];
	
echo "<tbody>";
echo "<tr>";
echo "<td>" . $userRow['id'] . "</td>";
echo "<td>" . $userRow['datein'] . "</td>";
echo "<td>" . $userRow['symptoms'] . "</td>";
echo "<td>" . $userRow['test'] . "</td>";
echo "<td>" . $userRow['suggestion'] . "</td>";
echo "<td>" . $userRow['treatment'] . "</td>";
echo "<td>" . $userRow['doctor'] . "</td>";
echo "<td>" . $userRow['ward'] . "</td>";
echo "<td>"  . $userRow['dateout'] ."</td>";

}
?>

<?php
echo "</tr>";
echo "</tbody>";
echo "</table>";

?>


	</div>
</div>
</div>
</div>


<!-- display appoinment end -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>