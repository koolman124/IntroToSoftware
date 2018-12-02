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
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">EMR Portal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Patient Summary <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Upcoming Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Prescription</a>
               </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown link
                   </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                 </div>
             </li>
           </ul>
        </div>
    </nav>

    <div id="wrapper">
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
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HealthcareDB";
 
// Create connection
 
$conn = new mysqli("localhost", "root", "", "HealthcareDB");
$sql = 'SELECT * FROM Patient WHERE Patient_ID = "00269bb7-e3ab-43a9-9cdf-cdf9b6e3b2b3"';
if (mysqli_query($conn, $sql)) {
 		echo "";
} 
else {
 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
 
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result); 
{ ?>
 
    		<table class="table table-striped">
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
        </table>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="js/sb-admin.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
