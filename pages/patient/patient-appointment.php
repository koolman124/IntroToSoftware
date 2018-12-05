<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../../login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['access']);
  	header("location: ../../login.php");
  }
  
  if ($_SESSION['access']== 3)
  {
    $_SESSION['msg'] = "You are a doctor";
  	header('location: ../doctor/doctor-dash.php');
  }
  if ($_SESSION['access']== 2)
  {
    $_SESSION['msg'] = "You are pharmacy";
  	header('location: ../pharmacy/pharm-dash.php');
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

    <title>Patient - Schedule an Appointment</title>

    <!-- Bootstrap CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="patient-dash.php">EMR Portal</a>

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
        <li class="nav-item">
          <a class="nav-link" href="patient-dash.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>My Info</span>
          </a>
        </li>
    <!-- Dashboard End -->
    <!-- Appointment Start -->    
        <li class="nav-item active">
          <a class="nav-link" href="patient-cal.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Appointments</span></a>
        </li>
    <!-- Appointment End -->
     <!-- View Med Info Start -->    
        <li class="nav-item">
          <a class="nav-link" href="patient-med.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>View Medical Info</span></a>
        </li>
    <!-- View Med Info End -->
    <!-- Prescription Records Start -->    
        <li class="nav-item">
          <a class="nav-link" href="patient-rx.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Prescription Records</span></a>
        </li>
    <!-- Prescription Records End -->
    <!-- Insurance Policy Start -->    
        <li class="nav-item">
          <a class="nav-link" href="patient-insurance.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>View Insurance Policy</span></a>
        </li>
    <!-- Insurance Policy End -->
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
            <div class="card-header"><i class="fas fa-table"></i> Appointments</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered"  width="100%" cellspacing="0">
                    
                
                

				<!-- Add .JS alert to remind patient of appointment -->
			<!-- Add .JS Calendar or HTML Form to select an appointment date -->

<!------------------------------------ PHP Begin---------------------------------------->

<?php
         if(isset($_POST['update'])) {
            
            
            $conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            
            $patient_id = '0095-4213-9755';
            $first_name = $_POST['fname'];
            
            $sql = "UPDATE Patient SET First_Name = '$first_name' WHERE Patient_ID = '$patient_id'";
                              
			$retval = mysqli_query($conn,$sql);
			            
            if(! $retval ) {
               die('Could not update data: ' . mysqli_error($conn));
            }
            echo "Updated data successfully\n";
            
            mysqli_close($conn);
            
         }else {
            ?>
               <form method = "post" action ="<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">First Name</td>
                        <td><input name="fname" type="text" id="fname" class="form-control"></td>
                     </tr>
                        <td>
                           <button name="update" class="btn btn-primary btn-block" type ="submit" id="update" value ="Update"> Update </button>
                        </td>
                     </tr>
                  
                  </table>
               </form>
               <div class="container">
                        <form method="post" action="login.php">
                            <div class="form-group">
                            <div class="form-label-group">
                                <input type="text" id="inputUser" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                                <label for="inputUser">Username</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="form-label-group">
                                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                                <label for="inputPassword">Password</label>
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
                        </form>
                </div>
            <?php
         }
      ?>
 

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

  </body>

</html>