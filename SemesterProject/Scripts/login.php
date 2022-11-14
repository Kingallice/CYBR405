<?php
$servername = "localhost";#"127.0.0.1:3306";
$username = "user";
$password = "";
$dbName = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$name = $_POST["username"];
$pswd = $_POST["password"];

//Checks to ensure that the account doesn't exist
$sql = "SELECT * FROM `accounts` WHERE `Username`='$name'";
if($result = mysqli_query($conn, $sql)){
	$row = $result->fetch_assoc();
	if($row["Password"] == $pswd){
		echo "1,".$row['Username'].",".$row['AccNumber'].",".$row['Email'];
	}
	else{
		echo "0,Username/Password is incorrect!";
	}
}
$conn->close();
?>