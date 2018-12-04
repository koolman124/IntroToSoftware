<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location:  ../../login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fill Prescriptions</title>

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
          <a class="nav-link" href="pharm-dash.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> View Upcoming Prescriptions</span>
          </a>
        </li>
    <!-- Dashboard End -->
    <!-- View Med Info Start -->    
        <li class="nav-item">
          <a class="nav-link" href="pharm-med.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Patient Medical Records</span></a>
        </li>
    <!-- View Med Info End -->
    <!-- Prescription Records Start -->    
        <li class="nav-item">
          <a class="nav-link" href="pharm-rx.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prescription Records</span></a>
        </li>
    <!-- Prescription Records End -->
    <!-- Test PHP/mySQL connection -->    
    <li class="nav-item">
          <a class="nav-link" href="../../index.php?logout='1'">
            <i class="fas fa-fw fa-folder"></i>
            <span>Logout</span></a>
        </li>
     <!-- Log Out End --> 
      </ul>
<!------------------------------------Sidebar End---------------------------------------->
<!--------------------------------- Container Start ------------------------------------->

      <div id="content-wrapper">
		<div class="container-fluid">
          <div class="card mb-3">
            <div class="card-header"><i class="fas fa-table"></i> Fill Prescriptions</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
		<thead>
 			<tr>
 				<th>Prescription ID</th>
 				<th>Patient ID</th>
 				<th>Doctor ID</th>
  				<th>Medication ID</th>
 				<th>Condition ID</th>
				<th>Pharmacy</th>
 				<th>Start Date</th>
 				<th>End Date</th>
 			</tr>
 		</thead>
 		<tfoot>
 			<tr>
 				<th>Prescription ID</th>
 				<th>Patient ID</th>
 				<th>Doctor ID</th>
  				<th>Medication ID</th>
 				<th>Condition ID</th>
				<th>Pharmacy</th>
 				<th>Start Date</th>
 				<th>End Date</th>
 			</tr>
		</tfoot>

			<!-- Add table to view current scripts from Prescriptions table -->
						<!-- Add .JS button to request a refill -->
						 <!-- Add .JS alert to confirm refill -->
					 <!-- Add .JS when conflicting scripts are filled -->
<!------------------------------------ PHP Begin---------------------------------------->

                
<?php
 
$servername = "localhost";
$username = "root";
$password = "troublein421";
$dbname = "HealthcareDB";
 
// Create connection
 
$conn = new mysqli("localhost", "root", "troublein421", "HealthcareDB");
$sql = 'SELECT * from Prescription';

if (mysqli_query($conn, $sql)) {
 		echo "";
} 
else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	 }
 
$count=1;
$result = mysqli_query($conn, $sql);
 
if (mysqli_num_rows($result) > 0) {
// output data of each row 
while($row = mysqli_fetch_assoc($result)) { ?>
 
 <tbody>
					<tr>
					<th> 
					<?php echo $row['Prescription_ID']; ?>
					</th>
					<td>
					<?php echo $row['Patient_ID']; ?>
					</td>
					<td>
					<?php echo $row['Doctor_ID']; ?>
					</td>
					<td>
					<?php echo $row['Medication_ID']; ?>
					</td>
					<td>
					<?php echo $row['Condition_ID']; ?>
					</td>
					<td>
					<?php echo $row['Pharmacy_ID']; ?>
					</td>
					<td>
					<?php echo $row['Start_Date']; ?>
					</td>
					<td>
					<?php echo $row['End_Date']; ?>
					</td>
					</tr>


</tbody>         
<?php
$count++;
}
} else {
echo '0 results';
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
