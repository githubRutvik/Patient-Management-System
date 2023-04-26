<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Add styles for the login form -->
	<style>
		form {
		  width: 80%;
		  margin: 0 auto;
		  text-align: center;
		}

		input[type=text], input[type=password] {
		  width: 50%;
		  padding: 12px 20px;
		  margin: 8px 0;
		  display: inline-block;
		  border: 1px solid #ccc;
		  box-sizing: border-box;
		  border-radius: 4px;
		}

		input[type=submit] {
		  width: 30%;
		  background-color: #4CAF50;
		  color: white;
		  padding: 14px 20px;
		  margin: 8px 0;
		  border: none;
		  border-radius: 4px;
		  cursor: pointer;
		}

		input[type=submit]:hover {
		  background-color: #45a049;
		}

		.container {
		  padding: 16px;
		}

		.error {
		  color: red;
		}
	</style>
</head>
<body>

	<!-- Login form -->
	<form method="post" action="">
		<div class="container">
			<h2>Login Form</h2>
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required><br>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<!-- <span class="error"><?php echo $error; ?></span> -->

			<br><input type="submit" value="Login">
		</div>
	</form>

	<?php
		// Check if the user has submitted the login form
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Get the user name and password from the form
			$username = $_POST["username"];
			$password = $_POST["password"];

			// Check if the user name and password are valid
			if ($username == "admin" && $password == "password123") {
				// Redirect the user to the home page
				header("Location: home.html");
			} else {
				// Display an error message
				$error = "Invalid user name or password.";
			}
		}
	?>

</body>
</html>
