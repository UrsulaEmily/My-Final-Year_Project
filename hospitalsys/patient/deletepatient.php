<?php
include_once '../assets/conn/dbconnect.php';
// Get the variables.
//$icPatient = $_POST['ic'];
$id= $_GET['id'];
   $todaydate = date("Y-m-d", time());  //<== DON'T FORGET THE 2ND ARGUMENT TO date(): TIME-STAMP. YOU MAY USE: time()
    $sqlDate   = date('Y-m-d', strtotime($todaydate));

$delete = mysqli_query($con,"UPDATE patienttreatment SET dateout = '$sqlDate'WHERE id=$id");
 if(isset($delete)) {
   echo "<script>alert('Treatment Checkout Successful');</script>";

echo "<script>window.location.href='patientapplist.php'</script>";
} else {
   echo "NO";
}



?>



