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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome Dr <?php echo $userRow['doctorFirstName'];?></title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom Fonts -->
    </head>
    <body class="bg-primary">
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse bg-dark navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctordashboard.php">Welcome <?php echo $userRow['doctorFirstName'];?>.</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['doctorFirstName']; ?> <b class="caret"></b></a>
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
                        <li class="active">
                            <a href="doctordashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="patientlist.php"><i class="fa fa-fw fa-edit"></i> Patient List</a>
                        </li>

                        <li >
                            <a href="wards.php"><i class="fa fa-fw fa-edit"></i> Ward  Management</a>
                        </li>

                        <li >
                            <a href="doctors.php"><i class="fa fa-fw fa-edit"></i> Records</a>
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
                            Dashboard
                            </h2>

                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->
                    <h2>Hello and welcome <?php echo $userRow['doctorFirstName']; ?>.</h2><br><br><br>
                    <h5>Please <span class="label label-danger">Check Patients List</span> to make Diagnosis.</h5>
<br><br>
                     <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-xl btn-filter ">Add Doctor</a>


                      <a href="#" data-toggle="modal" data-target="#myModal1" class="btn btn-primary btn-xl btn-filter ">View Doctors</a>  
                    <!-- panel start -->
                    <div class="panel panel-primary filterable">
                        
                </div>

                <!-- register -->
<?php
if (isset($_POST['signup'])) {
    $password = "123";
$doctorId = mysqli_real_escape_string($con,$_POST['doctorId']);
$fname  = mysqli_real_escape_string($con,$_POST['fname']);
$lname     = mysqli_real_escape_string($con,$_POST['lname']);
$address     = mysqli_real_escape_string($con,$_POST['address']);
$phone     = mysqli_real_escape_string($con,$_POST['phone']);
$email     = mysqli_real_escape_string($con,$_POST['email']);
$speciality     = mysqli_real_escape_string($con,$_POST['speciality']);
//INSERT
$query = " INSERT INTO `doctor`( `password`, `doctorId`, `doctorFirstName`, `doctorLastName`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `speciality`)
VALUES ( '$password','$doctorId', '$fname', '$lname','$address','$phone','$email','$speciality' ) ";
$result = mysqli_query($con, $query);
// echo $result;
if( $result )
{
?>
<script type="text/javascript">
alert('Doctor added Successfully!');
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert('Doctor already exists. Please try again');
</script>
<?php
}

}
?>

                <!-- modal container start -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title">Sign Up</h3>
                    </div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container" id="wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <form action="<?php $_PHP_SELF ?>" method="POST" accept-charset="utf-8" class="form" role="form">
                                        <h4>FIll form to add doctor</h4>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-6">
                                                <input type="Number" name="doctorId" value="" class="form-control input-lg" placeholder="Doctor Id" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="fname" value="" class="form-control input-lg" placeholder="Doctor's First name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="lname" value="" class="form-control input-lg" placeholder="Doctor's Last name" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="address" value="" class="form-control input-lg" placeholder="Doctor's Address" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="phone" value="" class="form-control input-lg" placeholder="Doctor's Phone Number" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="email" value="" class="form-control input-lg" placeholder="Doctor's Email" required />
                                            </div>
                                            <div class="col-xs-6 col-md-6">
                                                <input type="text" name="speciality" value="" class="form-control input-lg" placeholder="Doctor's Speciality" required />
                                            </div>
                                        </div>
                                        
                                        <br><br>
                                        <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="signup" id="signup">ADD Doctor</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->

               <!-- modal container start -->
        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- modal content -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        
                    </div>
                    <!-- modal body start -->
                    <div class="modal-body">
                        
                        <!-- form start -->
                        <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                           Doctor List
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Doctor List
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                    <div class="panel panel-primary filterable">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Doctors</h3>
                            <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                        </div>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered text-primary" >
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Doctor Id" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Speciality" disabled></th>
                                    <!--<th><input type="text" class="form-control" placeholder="ContactNo." disabled></th>-->
                                    <!-- <th><input type="text" class="form-control" placeholder="Email" disabled></th> -->
                                    <th><input type="text" class="form-control" placeholder="Phone Number" disabled></th>
                                    <!--<th><input type="text" class="form-control" placeholder="Status" disabled></th>-->
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <!-- <th><input type="text" class="form-control" placeholder="Address" disabled></th>-->
                                    
                                </tr>
                            </thead>
                            
                            <?php 
                            $result=mysqli_query($con,"SELECT * FROM doctor");
                            

                                  
                            while ($patientRow=mysqli_fetch_array($result)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $patientRow['doctorId'] . "</td>";
                                    echo "<td>" . $patientRow['doctorLastName'] . "</td>";
                                    echo "<td>" . $patientRow['speciality'] . "</td>";
                                    //echo "<td>" . $patientRow['patientPhone'] . "</td>";
                                    // echo "<td>" . $patientRow['patientEmail'] . "</td>";
                                    echo "<td>" . $patientRow['doctorPhone'] . "</td>";
                                    //echo "<td>" . $patientRow['patientMaritialStatus'] . "</td>";
                                    echo "<td>" . $patientRow['doctorEmail'] . "</td>";
                                    //echo "<td>" . $patientRow['patientAddress'] . "</td>";
                                    
                                    

                            

                            
                               
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                       
                        echo "</div>";
                        echo "</div>";
                        ?>
                        <!-- panel content end -->
                        <!-- panel end -->
                        </div>
                    </div><!-- panel start -->
                    
                    <!-- panel start -->

                </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal end -->
                    <!-- panel end -->
<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   // Use get instead of post.
   req.open("GET", url, true);
   req.send(null);
}
</script>


 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var appid = element.attr("id");
var info = 'id=' + appid;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deleteappointment.php",
   data: info,
   success: function(){
 }
});
  $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
 }
return false;
});
});
</script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <script type="text/javascript">
            /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
            $(document).ready(function(){
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                    }
                });
            });
        </script>
        <!-- script for jquery datatable end-->

    </body>
</html>