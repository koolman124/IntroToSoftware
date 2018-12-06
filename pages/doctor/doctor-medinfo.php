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
  
  if ($_SESSION['access']== 1)
  {
    $_SESSION['msg'] = "You are a patient";
  	header('location: ../patient/patient-dash.php');
  }
  if ($_SESSION['access']== 3)
  {
    $_SESSION['msg'] = "You are pharmacy";
  	header('location: ../pharmacy/pharm-dash.php');
  }

  if ($_SESSION['access']== 4)
  {
    $_SESSION['msg'] = "You are an insurance";
  	header('location: ../insurance/insurance-dash.php');
  }

  if ($_SESSION['access']== 5)
  {
    $_SESSION['msg'] = "You are an admin";
  	header('location: ../admin/admin-dash.php');
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
 
$conn = new mysqli("localhost", "root", "troublein421", "HealthcareDB");
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

<?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'allergy');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Allergy Name</th>
					<td> <?php echo $row['description']; ?></td>
				</tr>
				<tr>
                    <th>Start Date</th>
					<td> <?php echo $row['start_date']; ?></td>
				</tr>
				<tr>
                    <th>End Date</th>
					<td> <?php echo $row['end_date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>
	<?php	}
 ?>


<?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'med_condition');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Medical Condition</th>
					<td> <?php echo $row['description']; ?></td>
				</tr>
				<tr>
                    <th>Start Date</th>
					<td> <?php echo $row['start_date']; ?></td>
				</tr>
				<tr>
                    <th>End Date</th>
					<td> <?php echo $row['end_date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?>
    
 <?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'immunization');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Immunization Description</th>
					<td> <?php echo $row['description']; ?></td>
				</tr>
				<tr>
                    <th>Date</th>
					<td> <?php echo $row['date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?>

<?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'surgery');";


if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Surgery</th>
					<td> <?php echo $row['surgery']; ?></td>
				</tr>
				<tr>
                    <th>Reason</th>
					<td> <?php echo $row['reason']; ?></td>
				</tr>
				<tr>
                    <th>Date</th>
					<td> <?php echo $row['date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?>
 
 <?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'treatment');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Treatment</th>
					<td> <?php echo $row['description']; ?></td>
				</tr>
				<tr>
                    <th>Start Date</th>
					<td> <?php echo $row['start_date']; ?></td>
				</tr>
				<tr>
                    <th>End Date</th>
					<td> <?php echo $row['end_date']; ?></td>
				</tr>
				<tr>
                    <th>Reason</th>
					<td> <?php echo $row['reason']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?> 

<?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'medication');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th>Medication Name</th>
					<td> <?php echo $row['medication']; ?></td>
				</tr>
				<tr>
                    <th>Reason</th>
					<td> <?php echo $row['reason']; ?></td>
				</tr>
				<tr>
                    <th>Start Date</th>
					<td> <?php echo $row['start_date']; ?></td>
				</tr>
				<tr>
                    <th>End Date</th>
					<td> <?php echo $row['end_date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?>

 <?php
$patientid = $_GET['patient'];

$conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
$sql = "CALL ViewMedicalInfo ('$patientid', 'medical_data');";

if($result=mysqli_query($conn,$sql)){
	while($row=mysqli_fetch_assoc($result)){ ?>
	
			<tbody>
                <tr>
                    <th> <?php echo $row['type']; ?></th>
					<td> <?php echo $row['data']; ?></td>
				</tr>
				<tr>
                    <th>Date</th>
					<td> <?php echo $row['date']; ?></td>
				</tr>
			</tbody>	 
	
	<?php } ?>

	<?php	}
 ?>
 
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
                    <?php 
                      $patientid = $_GET['patient'];

                      echo "</p> <a class='btn btn-dark' href=\"doctor-updatemed.php?patient=" . urlencode($patientid) . "\">  Update info  </a>";
                    ?>
                  
                  </table>
               </form>
            <?php
         }
      ?>
    
      
      <?php
		 $patientid = $_GET['patient'];
		 	
         if(isset($_POST['update'])) {
            
            
            $conn = mysqli_connect("localhost","root","troublein421","HealthcareDB");
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error($conn));
            }
            
            $medicine = $_POST['Medication_ID'];
           

            if( isset($_POST['Medication_ID']) && !empty($_POST['Medication_ID']) )
            {
                //select writescript(410456, '0123-496d-9f4e', 197378, null, null);
                $sql = "SELECT WriteScript('230532','$patientid', $_POST['$medicine'],'308192','2134001') ";
                //"UPDATE Patient_Allergy SET Allergy_ID = '$allergy' WHERE Patient_ID = '$patientid'";
                //CALL WriteScript ('230532','$patientid', '308192','43878008','2134001');
                //SET @p0='230532'; SET @p1='0095-4213-9755'; SET @p2='308192'; 
                //SET @p3='43878008'; SET @p4='2134001'; 
                //CALL `WriteScript`(@p0, @p1, @p2, @p3, @p4, @p5); SELECT @p5 AS `errorcode`;              
                //CALL WriteScript ('230532','0095-4213-9755', '308192','43878008','2134001', @errorcode);
				        //$sql = "select @errorcode";
				        //$sql = "INSERT INTO table_name (name) VALUES 
      			  	//('".$_POST["Medication_ID"]."')";

  				if ($retval = mysqli_query($conn,$sql)) === TRUE) {
     					echo "New record created successfully";
  								} else {
			   							 echo "Error: " . $sql . "<br>" . $conn->error;
			 							}
                            
                else if(! $retval ) {
                die('Could not update data: ' . mysqli_error($conn));
                }
            }
            
            //echo "Updated data successfully\n";
            
            mysqli_close($conn);
            
         }else {
            ?>
            <div class="container">
               <form method = "post" action ="<?php $_PHP_SELF ?>">
                     <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-label-group">
                                    <input name="Medication_ID" type="text" id="Medication_ID" class="form-control">
                                    <p>Write a Prescription</p>
                                    <label for="Medication_ID">Medication_ID</label>
                            </div>
                        </div>
                    </div>    
                    
                    <button name="update" class="btn btn-primary btn-block" type ="submit" id="update" value ="Update"> Submit Prescription </button>
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
