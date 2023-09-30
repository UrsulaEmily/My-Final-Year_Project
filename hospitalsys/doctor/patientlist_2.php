<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE doctorId=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);





?>

<?php
if (isset($_POST['signup'])) {
$icPatient     = $_GET['id'];
$symptoms         = mysqli_real_escape_string($con,$_POST['symptoms']);
$test            = mysqli_real_escape_string($con,$_POST['test']);
$suggestion              = mysqli_real_escape_string($con,$_POST['suggestion']);
$treatment             = mysqli_real_escape_string($con,$_POST['treatment']);
$doctor                 = mysqli_real_escape_string($con,$_POST['doctor']);
$checkout               = 0;
$datein             = date('d-m-y h:i:s');
$ward               =  mysqli_real_escape_string($con,$_POST['ward']);

//INSERT
$query = " INSERT INTO patienttreatment (  icPatient, symptoms, test, suggestion,  treatment,doctor,checkout, datein, ward)
VALUES ( '$icPatient', '$symptoms', '$test', '$suggestion', '$treatment','$doctor','$checkout','$datein','$ward' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Patient Treated Successfully. Aid them checkout');</script>
<?php echo "<script>window.location.href ='patientlist.php'</script>";?>

<?php
}
else
{
?>
<script type="text/javascript">
alert('Patient Already Treated');
</script>
<?php
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['doctorFirstName'];?> </title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <!-- Custom Fonts -->
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctordashboard.php">Welcome <?php echo $userRow['doctorFirstName'];?></a>
                </div>

                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['doctorFirstName']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            
                            <li>
                                <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                         <li>
                            <a href="doctordashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        
                        <li class="active">
                            <a href="patientlist.php"><i class="fa fa-fw fa-edit"></i> Patient List</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Patient Treatment
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Patient Treatment
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                   

                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4 class="text-primary">Fill form to treat Patient ICNumber <?php $id = $_GET['id']; echo  $id ;?></h4>
                                        <div class="row">

                                            <div class="col-xs-6 col-md-6">
                                                <input type="text"  name="doctor" value="" class="form-control input-lg" placeholder="Doctor's Name" required >
                                                
                                            </div>

                                            <div class="col-xs-6 col-md-6">
                                                <input type="text"  name="ward" value="" class="form-control input-lg" placeholder="Ward No." required >
                                                
                                            </div>
                                            
                                            <div class="col-xs-6 col-md-6">

                                                <textarea name="symptoms" value="" class="form-control input-lg" placeholder="Patient symptoms" required rows="5" cols=""></textarea>
                                            </div>

                                            <div class="col-xs-6 col-md-6">
                                                <textarea  name="test" value="" class="form-control input-lg" placeholder="Medical Test" required rows="5" cols=""></textarea>

                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                
                                                <textarea  name="suggestion" value="" class="form-control input-lg" placeholder="Medical Suggestion" required rows="5" cols=""></textarea>

                                            </div>

                                            <div class="col-xs-6 col-md-6">
                                                <textarea  name="treatment" value="" class="form-control input-lg" placeholder="Patient Treatment" required rows="5" cols=""></textarea>
                                                
                                            </div>

                                            


                                        </div>
                                        
                                        
                                        <span class="text-danger">Counter check Treatment Before Clicking Button</span>
                                        
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">Treat Patient Now</button>
                                    </form>
                                 <div class="col-md-3"></div>   
                                </div>

                            </div>
                        

       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        
 
        
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-clockpicker.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <!-- Include Date Range Picker -->
    </body>
</html>