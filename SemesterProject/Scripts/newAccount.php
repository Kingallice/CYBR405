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
$email = $_POST["email"];
$pswd = $_POST["password"];

//Checks to ensure that the account doesn't exist
$sql = "SELECT `Username` FROM `accounts`";
if($result = mysqli_query($conn, $sql)){
	while($row = $result->fetch_assoc()) {
		if($row["Username"] == $name){
			echo "0, Exists";
			$exists = True;
			break;
		}
		else{
			$exists = False;
		}
	}
}
if(!$exists){
	//Pulls largest account number and sets current entry to 1 larger
	$accNumber = "";
	$temp = 0;
	$sql = "SELECT `AccNumber` FROM `accounts`";
	if($result = mysqli_query($conn, $sql)){
		while($row = $result->fetch_assoc()) {
			if($temp < intval($row["AccNumber"]))
				$temp = intval($row["AccNumber"]);
		}
		$accNumber = intval($temp) + 1;
		$accNumber = substr("00000000" . $accNumber, -8);
	}

	//Adds sent data to account table from sign up form
	$sql = "INSERT INTO `accounts`(`Username`, `Email`, `Password`, `AccNumber`) VALUES (\"$name\",\"$email\",\"$pswd\",\"$accNumber\")";
	if ($result = mysqli_query($conn, $sql)) {
	  echo "1,"."Sign Up";
	} else {
	  echo "0,Error";
	}
}
$conn->close();
?>