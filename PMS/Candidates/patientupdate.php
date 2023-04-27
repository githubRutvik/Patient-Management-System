<!DOCTYPE html>
<html>
<head>
<title>Update Patient Details</title>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
	  padding: 30px;
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
	  padding: 5px;
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
	</div><br><br>

    <!-- Patient registration form -->
<form method="post">
	<h1>Patient Details Updation</h1>
    <br><br>

    <label for="id">ID:</label>
	<input type="int" id="id" name="id"><br><br>

	<label for="name">Name:</label>
	<input type="text" id="name" name="name"><br><br>

	<label for="dob">Date of Birth:</label>
	<input type="date" id="dob" name="dob"><br><br>

	<label for="gender">Gender:</label>
	<input type="radio" id="male" name="gender" value="male">
	<label for="male">Male</label>
	<input type="radio" id="female" name="gender" value="female">
	<label for="female">Female</label><br><br>

	<label for="email">Email:</label>
	<input type="email" id="email" name="email"><br><br>

	<label for="phone">Phone Number:</label>
	<input type="tel" id="phone" name="phone"><br><br>

	<label for="address">Address:</label>
	<textarea id="address" name="address"></textarea><br><br>

    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form><br>

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
	
        $id = $_POST["id"];
		$name = $_POST["name"];
		$dob = $_POST["dob"];
		$gender = $_POST['gender'];
		$address = $_POST["address"];
		$phone = $_POST["phone"];



		//Inserting to database table
$sql = "UPDATE `patient` SET `p_name` = '$name', `p_gender`='$gender', `dob`='$dob', `p_address`= '$address', `p_phone`='$phone' WHERE `patient`.`p_id` = $id";

$result = mysqli_query($conn, $sql);

		echo "<h2>Update Information:</h2>";
		
		echo "Name: $name<br>";
		echo "Date of Birth: $dob<br>";
		echo "Gender: $gender<br>";
		echo "Address: $address<br>";
		echo "Phone: $phone<br>";

		echo"<br>";
		echo"<br>";
		echo"<br>";

        // record entry message
        if($result){
            echo "The record was updated successfully. <br>";
        }else{
            echo "The record was not updated successfully. <br>";
        }

	}



// Close the database connection
mysqli_close($conn);




	?>
</body>
</html>
