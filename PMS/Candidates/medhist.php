<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Medical History</title>
	<style>
		/* Style the navigation bar */
		.navbar {
		  background-color: #333;
		  overflow: hidden;
		}

        	/* Navigation links */
	.navbar a {
	  float: left;
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 14px 20px;
	  text-decoration: none;
	}


	/* Change the color of links on hover */
	.navbar a:hover {
	  background-color: #ddd;
	  color: black;
	}

	/* Style the form */
	form {
	  border: 3px solid #f1f1f1;
	  width: 50%;
	  margin: 0 auto;
	  padding: 20px;
	}

	h1{
		text-align: center;
	}

	/* Style the form input fields */
	input[type=text], input[type=date], input[type=email], input[type=tel], textarea {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  border-radius: 4px;
	  box-sizing: border-box;
	}

	/* Style the form submit button */
	input[type=submit], input[type=reset] {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  border-radius: 4px;
	  cursor: pointer;
	}

	/* Add a hover effect to the form submit button */
	input[type=submit]:hover, input[type=reset]:hover {
	  background-color: #45a049;
	 }

	/* Style the footer */
	.footer {
	  background-color: #333;
	  color: white;
	  text-align: center;
	  padding: 10px;
	  position: fixed;
	  left: 0;
	  bottom: 0;
	  width: 100%;
	}
</style>
</head>
<body>
	<!-- Navigation bar -->
	<div class="navbar">
		<a href="http://localhost/patient-management-system/PMS/Candidates/home.html">Home</a>
		<a href="http://localhost/patient-management-system/PMS/Candidates/doctor.php">Doctor</a>
		<a href="http://localhost/patient-management-system/PMS/Candidates/patient.php">Patient</a>
	</div>

    <!-- Patient registration form -->
<form method = "post">
	<h1>Medical History</h1>
	<label for="id">Doctor ID:</label>
	<input type="int" id="d_id" name="d_id"><br><br>

	<label for="id">Patient ID:</label>
	<input type="int" id="p_id" name="p_id"><br><br>

	<label for="dadd">Date of Addission:</label>
	<input type="date" id="dateadmit" name="dateadmit"><br><br>

    <label for="ddis">Date of Discharge:</label>
	<input type="date" id="datedischarge" name="datedischarge"><br><br>

	<label for="medicine">medicines:</label>
	<input type="text" id="medicines" name="medicines"><br><br>

	<label for="treatment">Treatment:</label>
	<textarea id="treatment" name="treatment"></textarea><br><br>

    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form>

<!-- Footer -->
<!-- <div class="footer">
	<p>Copyright © 2023 
	<a href="#">YourWebsite.com</a> All rights reserved.</p>
</div> -->








<?php


          //Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "patient_management_system";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);

//

// if(!$conn){
//     die("Connection was unsuccessful :".mysqli_connect_error());
// }
// else{
// echo "Connection was Successful";
// }


  

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$p_id= $_POST["p_id"];
		$d_id= $_POST["d_id"];
		$dateadmit = $_POST["dateadmit"];
		$datedischarge = $_POST['datedischarge'];
		$medicines = $_POST["medicines"];
		$treatment = $_POST["treatment"];
       

		//Inserting to database table
$sql = "INSERT INTO `medhist` (`p_id`, `d_id`, `date_admit`, `date_discharge`, `medicines`, `treatment`) 
VALUES ('$p_id', '$d_id', '$dateadmit', '$datedischarge', '$medicines', '$treatment')";
$result = mysqli_query($conn, $sql);

	

        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}

// //displaying records from db table
 $sql = "Select * from `medhist`";
 	$result = mysqli_query($conn, $sql);	

 	echo "<table class ='table table-dark'>";
 echo "<tr><th>Patient ID</th><th>Doctor ID</th><th>Date of Admission</th><th>Date of Discharge</th><th>Medicines</th><th>Treatment</th></tr>";
 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
     echo "<tr><td>" . $row["p_id"] . "</td><td>" . $row["d_id"] . "</td><td>" . $row["date_admit"] . "</td><td>" . $row["date_discharge"] . "</td><td>" . $row["medicines"] . "</td><td>" . $row["treatment"] . "</td></tr>";
 }
echo "</table>";

// Close the database connection
mysqli_close($conn);


	?>

</body>
</html>
