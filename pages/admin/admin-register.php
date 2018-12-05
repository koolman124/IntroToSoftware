<?php 
  include('../../server.php');

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
  
  if ($_SESSION['access']== 1)
  {
    $_SESSION['msg'] = "You are a patient";
  	header('location: ../patient/patient-dash.php');
  }

  if ($_SESSION['access']== 2)
  {
    $_SESSION['msg'] = "You are a doctor";
  	header('location: ../doctor/doctor-dash.php');
  }
  
  if ($_SESSION['access']== 3)
  {
    $_SESSION['msg'] = "You are pharmacy";
  	header('location: ../pharmacy/pharm-dash.php');
  }
  if ($_SESSION['access']== 4)
  {
    $_SESSION['msg'] = "You are insurance";
  	header('location: ../insurance/insurance-dash.php');
  }
  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Register</title>

    <!-- Bootstrap core CSS-->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin.css" rel="stylesheet">
</head> 
<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="admin-dash.php">EMR Portal</a>

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
        <li class="nav-item ">
          <a class="nav-link" href="admin-dash.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> View Doctors</span>
          </a>
        </li>

        <li class="nav-item active ">
          <a class="nav-link" href="admin-patients.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> View Patients</span>
          </a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="admin-register.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> Register User</span>
          </a>
        </li>
    <!-- Dashboard End -->
    <!-- Log Out Start -->    
        <li class="nav-item">
          <a class="nav-link" href="../../index.php?logout='1'">
            <i class="fas fa-fw fa-folder"></i>
            <span>Logout</span></a>
        </li>
     <!-- Log Out End --> 
      </ul>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Register an Account</div>
        <div class="card-body">
          <form method="post" action="admin-register.php">
          <?php include('../../errors.php'); ?>   
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUser" name="username" class="form-control" placeholder="Username" required="required" value="<?php echo $username; ?>">
                <label for="inputUser">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password_1" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
              </div>
              </div>
            <div class="form-group">
              <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="password_2" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
              </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="access" type="checkbox" value="1" id="access">
                <label class="form-check-label" for="access">
                    Patient
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="access" type="checkbox" value="2" id="access">
                <label class="form-check-label" for="access">
                    Doctor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="access" type="checkbox" value="3" id="access">
                <label class="form-check-label" for="access">
                    Pharmacy
                </label>
            </div>
            <button type="submit" class="btn btn-dark btn-block" name="reg_user">Register</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>
</html>