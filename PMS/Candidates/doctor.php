<!DOCTYPE html>
<html>
<head>
	<title>Doctor Registration Form</title>
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
		<a href="#">Home</a>
		<a href="#">Doctor</a>
		<a href="#">Patient</a>
	</div>

    <!-- Patient registration form -->
<form>
	<h1>Doctor Registration Form</h1>
	<label for="name">Name:</label>
	<input type="text" id="name" name="name"><br><br>

	<label for="address">Address:</label>
	<textarea id="address" name="address"></textarea><br><br>

	<label for="gender">Gender:</label>
	<input type="radio" id="male" name="gender" value="male">
	<label for="male">Male</label>
	<input type="radio" id="female" name="gender" value="female">
	<label for="female">Female</label><br><br>

	<label for="lname">Specialisation:</label>
	<input type="text" id="specialisation" name="Specialisation"><br><br>

	<label for="phone">Phone Number:</label>
	<input type="tel" id="phone" name="phone"><br><br>

    <input type="submit" value="Submit">
	<input type="reset" value="Reset">
</form>

<!-- Footer -->
<div class="footer">
	<p>Copyright © 2023 
	<a href="#">YourWebsite.com</a> All rights reserved.</p>
</div>








<?php


          //Connecting to database

$servername = "localhost";
$username = "root";
$password = "";
$database = "patient_management_system";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password, $database);

//

if(!$conn){
    die("Connection was unsuccessful :".mysqli_connect_error());
}
else{
echo "Connection was Successful";
}

//Inserting to database table
$sql = "INSERT INTO `doctor` (`d_name`, `dob`, `d_gender`, `d_address`, `d_phone`, `specialization`) 
VALUES ('$name', '$dob', '$gender', '$address', '$phone', '$specialization')";
$result = mysqli_query($conn, $sql);
  

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$name = $_POST["name"];
		$dob = $_POST["dob"];
		$gender = $_POST['gender'];
		$address = $_POST["address"];
		$phone = $_POST["phone"];
        $specialization = $_POST["specialization"];

		echo "<h2>Your Information:</h2>";
		
		echo "Name: $name<br>";
		echo "Date of Birth: $dob<br>";
		echo "Gender: $gender<br>";
		echo "Address: $address<br>";
        echo "Specialization: $specialization<br>";
		echo "Phone: $phone<br>";

        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}

//displaying records from db table
$sql = "Select * from `doctor`";
	$result = mysqli_query($conn, $sql);	

	echo "<table>";
echo "<tr><th>Doctor ID</th><th>Name</th><th>DOB</th><th>Gender</th><th>Address</th><th>Phone</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["address"] . "</td><td>" . $row["specialization"] . "</td><td>" . $row["phone"] . "</td></tr>";
}
echo "</table>";

// Close the database connection
mysqli_close($conn);


	?>

</body>
</html>
