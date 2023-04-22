<?php

//Connecting to database

$servername = "localhost";
$username = "root";
$password = "";

//Create Connection Object
$conn = mysqli_connect($servername, $username, $password);

//

if(!$conn){
    die("Connection was unsuccessful :".mysqli_connect_error());
}
else{
echo "Connection was Successful";
}
?>