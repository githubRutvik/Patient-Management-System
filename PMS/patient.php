<!DOCTYPE html>
<html>
<head>
	<title>Patient Information Form</title>
</head>
<body>
	<h1>Patient Information Form</h1>
	<form method="post" action="">
		

		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob"><br><br>

		<label for="gender">Gender:</label>
		<select id="gender" name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option> 
		</select><br><br>

		<label for="address">Address:</label>
		<textarea id="address" name="address"></textarea><br><br>

		<label for="phone">Phone:</label>
		<input type="tel" id="phone" name="phone"><br><br>

		<input type="submit" value="Submit">
	</form>

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
$sql = "INSERT INTO `patient` ( `p_name`, `dob`, `p_gender`, `p_address`, `p_phone`)
         VALUES ( '$name', '$dob', '$gender', '$address', '$phone')";
$result = mysqli_query($conn, $sql);
  

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$name = $_POST["name"];
		$dob = $_POST["dob"];
		$gender = $_POST["gender"];
		$address = $_POST["address"];
		$phone = $_POST["phone"];

		echo "<h2>Your Information:</h2>";
		
		echo "Name: $name<br>";
		echo "Date of Birth: $dob<br>";
		echo "Gender: $gender<br>";
		echo "Address: $address<br>";
		echo "Phone: $phone<br>";

        // record entry message
        if($result){
            echo "The record was inserted successfully. <br>";
        }else{
            echo "The record was not inserted successfully. <br>";
        }

	}








	?>
</body>
</html>
