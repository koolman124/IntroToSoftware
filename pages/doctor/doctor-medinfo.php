<?php  
    /* Start the session if the session is active via the user logging in */

    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Doctor Update Medical Info</title>

    <!-- Bootstrap CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="doctor-dash.php">EMR Portal</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
    </nav>

    <div id="wrapper">

<!------------------------------------Sidebar Start------------------------------------->
	<!-- Dashboard Start -->
  <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="doctor-dash.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> Patients Summary</span>
          </a>
        </li>
    <!-- Dashboard End -->
    <!-- Appointment Start -->    
        <li class="nav-item">
          <a class="nav-link" href="doctor-cal.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Upcoming Appointments</span></a>
        </li>
    <!-- Appointment End -->
    <!-- Prescription Records Start -->    
        <li class="nav-item">
          <a class="nav-link" href="doctor-rx.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prescriptions</span></a>
        </li>
    <!-- Prescription Records End -->
    <!-- Test PHP/mySQL connection -->    
        <li class="nav-item">
          <a class="nav-link" href="testPHP.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>TEST PHP</span></a>
        </li>
    <!-- Test PHP/mySQL connection --> 
    <!-- Log Out Start -->    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Account/Logout</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="index.html">Login</a>
            <a class="dropdown-item" href="register.html">Register</a>
            <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          </div>
        </li>
     <!-- Log Out End --> 
      </ul>
<!------------------------------------Sidebar End---------------------------------------->
<!--------------------------------- Container Start ------------------------------------->

      <div id="content-wrapper">
		<div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Patient Medical Records</div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">

		
		
<!-- Pass Patient_ID to view Medical Records & populate fields -->
<!-- Patient Medical Records: Allergy, Condition, Immunization, Surgery, Treatment, -->
<!-- Medicine, Obsevation Tables -->
<!-- Forms required to make any adjustments to data, update DB when finished -->
                
<!------------------------------------ PHP Begin---------------------------------------->
 
                
<?php

$patientid = $_GET['patient'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HealthcareDB";
 
// Create connection
 
$conn = new mysqli("localhost", "root", "", "HealthcareDB");
$sql = "SELECT * FROM Patient WHERE Patient_ID = '$patientid'";
if (mysqli_query($conn, $sql)) {
 		echo "";
} 
else {
 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
{ ?>
    <tbody>
                <tr>
                      <th>Patient ID</th>
                      <td> <?php echo $row['Patient_ID']; ?> </td>
                </tr>
                <tr>  
                      <th>User ID:</th>
                      <td></td>    
                </tr>
                <tr>
                      <th>First Name</th>
                      <td> <?php echo $row['First_Name']; ?> </td>
                </tr>
                <tr>
                      <th>Last Name</th>
                      <td> <?php echo $row['Last_Name']; ?> </td>
                </tr>
                <tr>
                      <th>Birth Date</th>
                      <td> <?php echo $row['Birth_Date']; ?> </td>
                </tr>
                <tr>
                      <th>Social Security Number</th>
                      <td> <?php echo $row['SSN']; ?> </td>
                </tr>
                <tr>
                      <th>Address</th>
                      <td> <?php echo $row['Address']; ?> </td>
                </tr>
                <tr>
                      <th>City</th>
                      <td> <?php echo $row['City']; ?> </td>
                </tr>
                <tr>
                      <th>State</th>
                      <td> <?php echo $row['State']; ?> </td>
                </tr>
                <tr>
                      <th>Zip Code</th>
                      <td> <?php echo $row['Zip_Code']; ?> </td>
                </tr>
                <tr>
                      <th>Race</th>
                      <td> <?php echo $row['Race']; ?> </td>
                </tr>
                <tr>
                      <th>Sex</th>
                      <td> <?php echo $row['Sex']; ?> </td>
                </tr>
                <tr>
                      <th>Phone</th>
                      <td> <?php echo $row['Phone']; ?> </td>
                </tr>
                <tr>
                      <th>Email</th>
                      <td> <?php echo $row['Email']; ?> </td>
                </tr>
  </tbody>
<?php
}?>  

<!------------------------------------ PHP End---------------------------------------->

                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>CSCI 380 Intro SW Eng Final Project</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
<!---------------------------------- Container End -------------------------------------->   
   
    <!-- Bootstrap JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../../vendor/chart.js/Chart.min.js"></script>
    <script src="../../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="../../js/sb-admin.min.js"></script>
    <script src="../../js/demo/datatables-demo.js"></script>
    <script src="../../js/demo/chart-area-demo.js"></script>